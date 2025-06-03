<?php

namespace Database\Factories;

use App\Enums\PatientStatus;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition() : array
    {
        return [
            'status'      => fake()->randomElement(PatientStatus::cases()),

            'first_name'  => $this->faker->firstName(),
            'middle_name' => $this->faker->firstName(),
            'last_name'   => $this->faker->lastName(),
            'dob'         => Carbon::now(),

            'gender'      => $this->faker->word(),
            'email'       => $this->faker->unique()
                                         ->safeEmail(),
            'password'    => bcrypt($this->faker->password()),

            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ];
    }
}
