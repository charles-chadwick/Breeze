<?php

namespace Database\Factories;

use App\Models\Prescription;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Prescription> */
class PrescriptionFactory extends Factory
{
    protected $model = Prescription::class;

    public function definition(): array
    {
        return [
            'medication_id' => fake()->randomNumber(),
            'patient_id' => fake()->randomNumber(),
            'prescriber_id' => fake()->randomNumber(),
            'dosage' => fake()->word(),
            'frequency' => fake()->randomNumber(),
            'route' => fake()->word(),
            'quantity' => fake()->randomNumber(),
            'refills' => fake()->randomNumber(),
            'prescribed_at' => fake()->dateTime(),
            'instructions' => fake()->paragraph(),
            'created_by' => fake()->randomNumber(),

        ];
    }
}
