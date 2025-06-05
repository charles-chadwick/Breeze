<?php

namespace Database\Factories;

use App\Models\EncounterUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EncounterUserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'encounter_id' => $this->faker->randomNumber(),
            'user_id' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
