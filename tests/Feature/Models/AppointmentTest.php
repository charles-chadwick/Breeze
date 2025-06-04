<?php

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;

it('has a patient', function () {

    $appointment = Appointment::factory()
                          ->create([
                              'patient_id' => Patient::factory()->create(),
                          ]);

    expect($appointment->patient)
        ->toBeInstanceOf(Patient::class);
});

it('has users', function () {

    $encounter = Appointment::factory()
                          ->has(User::factory()
                                    ->count(3))
                          ->create();

    expect($encounter->users)
        ->toHaveCount(3)
        ->each->toBeInstanceOf(User::class);
});
