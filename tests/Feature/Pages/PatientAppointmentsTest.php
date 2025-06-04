<?php

use App\Models\Appointment;
use App\Models\Patient;
use function Pest\Laravel\get;

it('shows all patient appointments', function () {

    // Arrange
    $patient = Patient::factory()
                      ->has(Appointment::factory()
                            ->count(2))
                      ->create();

    // Act & Assert
    get(route('patients.appointments', $patient))
        ->assertOk()
        ->assertSeeText($patient->appointments->first()->title)
        ->assertSeeText("{$patient->appointments->count()} Appointments");
});
