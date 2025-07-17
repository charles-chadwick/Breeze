<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        echo "Starting Users\n";
//        (new UserSeeder)->run();
//
//        echo "Starting Discussions\n";
//        (new DiscussionSeeder())->run();

        echo "Starting Appointments\n";
        (new AppointmentSeeder())->run();
    }
}
