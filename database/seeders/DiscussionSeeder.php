<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Discussion;
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

        $content = collect(file(database_path('src/RickAndMortyContent.csv')));

        foreach (
            User::where('role', '!=', UserRole::Administrator)->get() as $user) {

            CauserResolver::setCauser($user);

            // start one to three discussions, then add in some people
            for ($i = 0 ; $i < rand(1, 5) ; $i++) {
                Discussion::factory()
                          ->create([
                              'title'      => str($content->random())
                                  ->trim()
                                  ->replace('"', '')
                                  ->limit(),
                              'created_at' => fake()->dateTimeBetween(Carbon::parse($user->created_at)->subDays(5), '-1 day'),
                              'user_id'    => $user->id,
                          ]);
            }

        }

    }
}
