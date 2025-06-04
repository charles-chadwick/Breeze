<?php

use App\Models\Appointment;
use App\Models\Patient;

use function Pest\Laravel\get;

it('shows all patient appointments', function () {

    // Arrange
    $patient = Patient::factory()
        ->has(Appointment::factory()
            ->count(2)->state([
                  'date_and_time' => '1980-01-01 15:15:00',
                  'length' => 15,
              ]))
        ->create();

    // Act & Assert
    get(route('patients.appointments', $patient))
        ->assertOk()
        ->assertSeeText($patient->appointments->first()->title)
        ->assertSeeText("{$patient->appointments->count()} Appointments")
        ->assertSeeText('01/01/1980 03:15 PM to 03:30 PM');
});
