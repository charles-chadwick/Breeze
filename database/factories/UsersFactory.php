<?php

namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class UsersFactory extends Factory
{
    protected $model = Users::class;

    public function definition() : array
    {
        return [
            'prefix'         => $this->faker->word(),

            'first_name'     => $this->faker->firstName(),
            'middle_name'    => $this->faker->name(),
            'last_name'      => $this->faker->lastName(),
            'suffix'         => $this->faker->word(),
            'role'           => $this->faker->word(),
            'status'         => $this->faker->word(),
            'email'          => $this->faker->unique()
                                            ->safeEmail(),
            'password'       => bcrypt($this->faker->password()),
            'remember_token' => Str::random(10),
            'created_by'     => $this->faker->randomNumber(),
            'updated_by'     => $this->faker->randomNumber(),
            'deleted_by'     => $this->faker->randomNumber(),
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ];
    }
}
