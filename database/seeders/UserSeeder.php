<?php

namespace Database\Seeders;


use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Facades\CauserResolver;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        DB::table('users')
          ->truncate();
        $characters = collect(json_decode(file_get_contents(database_path('src/rickandmorty_characters.json')), true))
          ->random(100);

        $counter = 0;

        $admin = User::factory()
                     ->create([
                         'status'     => UserStatus::Active,
                         'role'       => UserRole::Administrator,
                         'first_name' => 'John',
                         'last_name'  => 'Doe',
                         'email'      => 'john.doe@example.com',
                         'created_at' => '2020-01-01 00:00:00',
                     ]);
        CauserResolver::setCauser($admin);

        foreach ($characters as $character) {

            $name = array_map(function ($n) {
                return trim(preg_replace('/[^A-Za-z0-9\s]/', '', $n));
            }, explode(' ', $character[ 'name' ]));

            $role = match (true) {
                $counter <= 5  => UserRole::Doctor,
                $counter <= 10 => UserRole::Nurse,
                $counter <= 15 => UserRole::Assistant,
                $counter <= 25 => UserRole::Staff,
                default => UserRole::Patient,
            };

            $created_at = fake()->dateTimeBetween('2020-01-01 00:00:00', '2021-01-01 00:00:00');
            if ($role === UserRole::Patient) {
                $admin = User::inRandomOrder()->first();
                CauserResolver::setCauser($admin);
                $created_at = fake()->dateTimeBetween('2021-01-02 00:00:00', '-1 year');
            }

            $first_name = array_shift($name);
            $last_name = trim(array_pop($name));
            $middle_name = implode(' ', $name);
            if ($last_name === "") {
                $last_name = $first_name;
            }

            $email = "$first_name.$last_name".rand(1, 999)."@example.com";

            $model = User::create([
                'status'     => UserStatus::Active,
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name'  => $last_name === '' ? 'N/A' : $last_name,
                'role'       => $role,
                'email'      => strtolower($email),
                'password'   => bcrypt('password'),
                'created_at' => $created_at,
                'updated_at' => $created_at,
            ]);


            $avatar_path = database_path('src/avatars/'.str_replace(' ', '-', $character[ 'name' ]).'.jpeg');
            if (!file_exists($avatar_path)) {
                echo "$avatar_path does not exist\n";
            }

            $counter++;
            try {
                $model->addMedia($avatar_path)
                      ->preservingOriginal()
                      ->toMediaCollection('avatar');
            } catch (FileDoesNotExist|FileIsTooBig $e) {
                echo $e->getMessage();
            }

        }

        echo "$counter total\n";
    }
}
