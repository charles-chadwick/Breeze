<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition() : array
    {
        return [
            'patient_id'    => fake()->randomNumber(),

            'date_and_time' => Carbon::now(),
            'length'        => fake()->randomNumber(),
            'status'        => fake()->word(),
            'type'          => fake()->word(),
            'title'         => fake()->word(),
            'description'   => fake()->text(),
            'created_by'    => fake()->randomNumber(),
            'updated_by'    => fake()->randomNumber(),
            'deleted_by'    => fake()->randomNumber(),
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ];
    }
}
