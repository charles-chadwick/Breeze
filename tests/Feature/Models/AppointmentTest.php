<?php

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;

it('has a patient', function () {

    $appointment = Appointment::factory()
        ->create([
            'patient_id' => Patient::factory()
                ->create(),
        ]);

    expect($appointment->patient)->toBeInstanceOf(Patient::class);
});

it('has users', function () {

    $appointment = Appointment::factory()
        ->has(User::factory()->count(3))
        ->create();

    expect($appointment->users)
        ->toHaveCount(3)
        ->each->toBeInstanceOf(User::class);
});

it('cannot be double booked', function () {

    $appointment = Appointment::factory()
        ->has(User::factory()
            ->state(['id' => 1]))
        ->create([
            'date_and_time' => '1980-01-01 10:00:00',
            'status' => AppointmentStatus::Confirmed,
        ]);

    expect($appointment->alreadyExists('1980-01-01 10:00:00', 1, AppointmentStatus::Confirmed))->toBeTrue();
});
