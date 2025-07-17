<?php

namespace Database\Factories;

use App\Enums\AppointmentStatus;
use App\Enums\UserRole;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition() : array
    {
        return [
            'status'        => fake()->randomElement(AppointmentStatus::class),
            'type'          => fake()->randomElement(['In-Office', 'Phone Call', 'Video Call']),
            'title'         => $this->faker->word(),
            'description'   => $this->faker->text(),
            'date_and_time' => Carbon::now(),
            'length'        => fake()->randomElement([
                10,
                15,
                30,
                45
            ]),
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
            'patient_id'    => User::factory(state: ['role', UserRole::Patient]),
        ];
    }
}
