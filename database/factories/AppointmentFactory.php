<?php

namespace Database\Factories;

use App\Enums\AppointmentStatus;
use App\Enums\AppointmentType;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition(): array
    {
        return [
            'patient_id' => fake()->randomNumber(),
            'date_and_time' => Carbon::now(),
            'length' => fake()->randomElement([15, 30, 45]),
            'status' => fake()->randomElement(AppointmentStatus::cases()),
            'type' => fake()->randomElement(AppointmentType::cases()),
            'title' => fake()->word(),
            'description' => fake()->text(),
            'created_by' => fake()->randomNumber(),
            'updated_by' => fake()->randomNumber(),
            'deleted_by' => fake()->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
