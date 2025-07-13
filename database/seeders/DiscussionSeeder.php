<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Discussion;
use App\Models\DiscussionMessage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Facades\CauserResolver;

class DiscussionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        DB::table('discussions')
          ->truncate();
        DB::table('discussions_messages')
          ->truncate();
        DB::table('discussions_users')
          ->truncate();

        $content = collect(file(database_path('src/RickAndMortyContent.csv')));

        foreach (
            User::where('role', '!=', UserRole::Administrator)
                ->get() as $user) {

            CauserResolver::setCauser($user);

            // start one to five discussions, then add in some people
            for ($i = 0 ; $i < rand(1, 5) ; $i++) {
                $discussion = Discussion::factory()
                                        ->create([
                                            'title'      => str($content->random())
                                                ->trim()
                                                ->replace('"', '')
                                                ->limit(),
                                            'created_at' => fake()->dateTimeBetween(Carbon::parse($user->created_at)
                                                                                          ->subDays(5), '-1 day'),
                                            'user_id'    => $user->id,
                                        ]);

                // Get 1 to 3 people other than OP, who are a part of this.
                // One should be a patient. The other are staff.

                if ($user->role !== UserRole::Patient) {
                    $patient = User::where('role', UserRole::Patient)
                                   ->get()
                                   ->first();
                } else {
                    $patient = $user;
                }

                $other_users = User::where('role', '!=', UserRole::Patient)
                                   ->inRandomOrder()
                                   ->limit(rand(1, 3))
                                   ->get();
                $discussion->users()
                           ->attach($other_users, [
                               'status'     => 'Unread',
                               'created_at' => Carbon::parse($discussion->created_at)
                                                     ->toDateTimeString()
                           ]);
                $discussion->users()
                           ->attach($patient, [
                               'status'     => 'Unread',
                               'created_at' => Carbon::parse($discussion->created_at)
                                                     ->toDateTimeString()
                           ]);

                for ($a = 0 ; $a <= rand(1, 10) ; $a++) {

                    $discussion_user = $discussion->users->random();

                    DiscussionMessage::factory([
                        'discussion_id' => $discussion->id,
                        'user_id'       => $discussion_user->id,
                        'status'        => 'Unread',
                        'created_at'    => fake()->dateTimeBetween(Carbon::parse($discussion->created_at))
                    ])->create();
                }

            }

        }

    }
}
