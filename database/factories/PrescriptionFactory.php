<?php

namespace Database\Factories;

use App\Enums\MedicationFrequency;
use App\Enums\RouteOfAdministration;
use App\Models\Prescription;
use App\Models\User;
use Carbon\Carbon;
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
            'dosage' => fake()->randomElement(['2 mg', '5mg', '10mc/mg']),
            'frequency' => fake()->randomElement(MedicationFrequency::class),
            'route' => fake()->randomElement(RouteOfAdministration::class),
            'quantity' => fake()->randomNumber(1),
            'refills' => fake()->randomNumber(1),
            'prescribed_at' => fake()->dateTimeBetween('-1 year', '-1 day'),
            'instructions' => fake()->paragraph(),
            'created_by' => User::inRandomOrder()->first(),

        ];
    }
}
