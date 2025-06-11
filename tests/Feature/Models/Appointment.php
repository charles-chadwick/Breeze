<?php

use App\Models\Appointment;
use App\Models\User;

it('has a properly formatted date and time range', function () {

    // Arrange
    $appointment = Appointment::factory()->create([
        'date_and_time' => '2000-01-01 10:00:00',
        'length' => '15',
    ]);

    // Act & Assert
    expect($appointment->full_date_and_time_range)
        ->toEqual("01/01/2000 from 10:00 AM to 10:15 AM");

});

it('has users', function () {

    // Arrange
    $appointment = Appointment::factory()->create();
    $users = User::factory()->count(3)->create();
    $appointment->users()->attach($users, ['created_by' => 1]);

    // Act & Assert
    expect($appointment->users->count())
        ->toBe(3);

});
