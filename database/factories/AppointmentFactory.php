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
            'patient_id'    => $this->faker->randomNumber(),

            'date_and_time' => Carbon::now(),
            'length'        => $this->faker->randomNumber(),
            'status'        => $this->faker->word(),
            'type'          => $this->faker->word(),
            'title'         => $this->faker->word(),
            'description'   => $this->faker->text(),
            'created_by'    => $this->faker->randomNumber(),
            'updated_by'    => $this->faker->randomNumber(),
            'deleted_by'    => $this->faker->randomNumber(),
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ];
    }
}
