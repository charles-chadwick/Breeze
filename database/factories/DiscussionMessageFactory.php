<?php

namespace Database\Factories;

use App\Models\DiscussionMessage;
use App\Models\Discussions;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DiscussionMessageFactory extends Factory
{
    protected $model = DiscussionMessage::class;

    public function definition() : array
    {
        return [
            'status'     => $this->faker->word(),

            'content'    => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'discussions_id' => Discussions::factory(),
            'user_id'  => User::factory(),
        ];
    }
}
