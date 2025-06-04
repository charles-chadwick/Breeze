<?php

namespace Database\Factories;

use App\Enums\EncounterStatus;
use App\Models\Encounter;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EncounterFactory extends Factory
{
    protected $model = Encounter::class;

    public function definition(): array
    {
        return [
            'type' => $this->faker->word(),
            'date_of_service' => Carbon::now(),
            'patient_id' => $this->faker->randomNumber(),
            'title' => $this->faker->word(),
            'content' => $this->faker->word(),
            'status' => fake()->randomElement(EncounterStatus::cases()),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
