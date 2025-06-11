<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\AppointmentsUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AppointmentsUserFactory extends Factory
{
    protected $model = AppointmentsUser::class;

    public function definition() : array
    {
        return [
            'created_by' => $this->faker->randomNumber(),

            'updated_by' => $this->faker->randomNumber(),
            'deleted_by' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'appointment_id' => Appointment::factory(),
            'user_id'        => User::factory(),
        ];
    }
}
