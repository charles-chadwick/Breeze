<?php

use App\Models\Encounter;
use App\Models\User;

it('has encounters', function () {

    // Arrange
    $users = User::factory()
        ->has(Encounter::factory()
            ->count(2))
        ->create();

    // Act & Assert
    expect($users->encounters)
        ->toHaveCount(2)
        ->each->toBeInstanceOf(Encounter::class);

});
