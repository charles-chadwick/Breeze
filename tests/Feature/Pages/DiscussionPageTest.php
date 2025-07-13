<?php

use App\Models\Discussion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use function Pest\Laravel\get;

it('has a list of discussions created by a specific user', function () {

    $user = User::factory()
                ->create();

    $discussions = Discussion::factory(2)
                             ->create([
                                 'user_id' => $user->id
                             ]);

    $this->actingAs($user);
    get(route('discussions.list'))
        ->assertOk()
        ->assertSeeText([
            $discussions->first()->title,
            $discussions->last()->title,
            $user->full_name,
        ]);
});
