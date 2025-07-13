<?php

namespace Database\Factories;

use App\Models\Discussions;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DiscussionsFactory extends Factory
{
    protected $model = Discussions::class;

    public function definition() : array
    {
        return [
            'title'      => $this->faker->word(),

            'status'     => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
        ];
    }
}
