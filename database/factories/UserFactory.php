<?php

namespace Database\Factories;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'prefix' => fake()->word(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'suffix' => fake()->word(),
            'role' => fake()->randomElement(UserRole::cases()),
            'status' => fake()->randomElement(UserStatus::cases()),
            'email' => fake()->unique()
                ->safeEmail(),
            'password' => bcrypt(fake()->password()),
            'remember_token' => Str::random(10),
            'created_by' => fake()->randomNumber(),
            'updated_by' => fake()->randomNumber(),
            'deleted_by' => fake()->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
