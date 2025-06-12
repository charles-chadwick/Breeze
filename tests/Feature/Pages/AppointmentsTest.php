<?php

use App\Models\Appointment;

use function Pest\Laravel\get;

it('shows a list of appointments', function () {

    // Arrange
    $appointments = Appointment::factory()
        ->count(2)
        ->create();

    // Act & Assert
    get(route('appointments.index'))
        ->assertOk()
        ->assertSee([
            $appointments->first()->title,
            $appointments->last()->title,
        ]);

});
