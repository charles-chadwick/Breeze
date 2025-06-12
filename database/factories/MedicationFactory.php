<?php

namespace Database\Factories;

use App\Enums\DoseForm;
use App\Models\Medication;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MedicationFactory extends Factory
{
    protected $model = Medication::class;

    public function definition() : array
    {
        return [
            'brand_name' => $this->faker->name(),
            'generic_name' => $this->faker->name(),
            'manufacturer' => $this->faker->word(),
            'strength'     => $this->faker->word(),
            'dose_form'    => fake()->randomElement(DoseForm::cases()),
            'ndc'          => fake()->randomNumber(5).'-'.fake()->randomNumber(4).'-'.fake()->randomNumber(2),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
            'created_by'   => fake()->randomNumber()
        ];
    }
}
