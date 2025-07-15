<?php

use App\Models\Discussion;
use App\Models\User;

use function Pest\Laravel\get;

it('has a list of discussions created by a specific users', function () {

    $user = User::factory()
        ->create();

    $discussions = Discussion::factory(2)
        ->create([
            'user_id' => $user->id,
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

it('has a list of discussions with many associated users', function () {

    $users = User::factory(5)
        ->create();

    $discussions = Discussion::factory()
        ->create();

    $discussions->users()
        ->attach($users, ['status' => 'Unread']);
    expect($discussions->users->count())->toBe(5);
});
