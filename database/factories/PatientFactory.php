<?php

namespace Database\Factories;

use App\Enums\Gender;
use App\Enums\PatientStatus;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition() : array
    {
        return [
            'prefix'         => fake()->word(),

            'first_name'     => fake()->firstName(),
            'middle_name'    => fake()->firstName(),
            'last_name'      => fake()->lastName(),
            'suffix'         => fake()->word(),
            'gender'         => fake()->randomElement(Gender::cases()),
            'dob'            => Carbon::now(),
            'status'         => fake()->randomElement(PatientStatus::cases()),
            'email'          => fake()->unique()
                                            ->safeEmail(),
            'password'       => bcrypt(fake()->password()),
            'remember_token' => Str::random(10),
            'created_by'     => fake()->randomNumber(),
            'updated_by'     => 0,
            'deleted_by'     => 0,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ];
    }
}
