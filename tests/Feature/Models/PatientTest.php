<?php

use App\Models\Appointment;
use App\Models\Encounter;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Sequence;

it('shows the properly formatted full name', function () {

    // Arrange
    $patients = Patient::factory()
        ->state(new Sequence([
            'last_name' => 'Simpson',
            'first_name' => 'Homer',
            'middle_name' => 'Jay',
        ], [
            'last_name' => 'Gumble',
            'first_name' => 'Barnard',
            'middle_name' => '',
            // deliberately put a blank space in
        ]))
        ->count(2)
        ->create();

    // Act & Assert
    expect($patients[0]->full_name)
        ->toBe('Homer Jay Simpson')
        ->and($patients[1]->full_name)
        ->toBe('Barnard Gumble');
});

it('shows the proper age', function () {

    // Arrange
    $patient = Patient::factory()
        ->create([
            'dob' => Carbon::now()
                ->subYears(10),
        ]);

    // Act & Assert
    expect($patient->age)->toBe(10);
});

it('has encounters', function () {

    // Arrange
    $patient = Patient::factory()
        ->has(Encounter::factory()
            ->count(2))
        ->create();

    // Act & Assert
    expect($patient->encounters)
        ->toHaveCount(2)
        ->each->toBeInstanceOf(Encounter::class);
});

it('has appointments', function () {

    // Arrange
    $patient = Patient::factory()
        ->has(Appointment::factory()
                         ->count(3))
        ->create();

    // Act & Assert
    expect($patient->appointments)
        ->toHaveCount(3)
        ->each->toBeInstanceOf(Appointment::class);
});
