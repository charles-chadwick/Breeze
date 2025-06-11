<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('patients')
            ->truncate();

        $counter = 0;
        foreach (DatabaseSeeder::characterList() as $character) {

            $counter++;
            if ($counter < 9) {
                continue;
            }
            // because we truncate the table every time, the user IDs will be 2-10 for any staff.
            $created_by = User::where('role', '!=', UserRole::SuperAdmin)
                ->inRandomOrder()
                ->first();
            $created_at = fake()->dateTimeBetween($created_by->created_at, '-1 week');

            Patient::factory()
                ->create([
                    'prefix' => $character['gender'] == 'Male' ? 'Mr' : 'Ms',
                    'suffix' => '',
                    'status' => 'Active',
                    'dob' => fake()
                        ->dateTimeBetween('-100 years', '-1 year')
                        ->format('Y-m-d'),
                    'gender' => $character['gender'],
                    'first_name' => $character['first_name'],
                    'middle_name' => $character['middle_name'],
                    'last_name' => $character['last_name'],
                    'email' => str_replace(' ', '_',
                        strtolower("{$character['first_name']}.{$character['last_name']}@example.com")),
                    'password' => bcrypt('password'),
                    'created_by' => $created_by->id,
                    'updated_by' => $created_by->id,
                    'created_at' => $created_at,
                    'updated_at' => $created_at,
                ]);

        }
    }
}
