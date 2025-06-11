<?php

use App\Models\Patient;

use function Pest\Laravel\get;

it('shows a list of patients', function () {

    // Arrange
    $patients = Patient::factory()->count(2)->create();

    // Act & Assert
    get(route('patients.index'))
        ->assertOk()
        ->assertSeeText([
            $patients->first()->full_name,
            $patients->first()->email,
            $patients->first()->dob,
            $patients->first()->gender,
            $patients->first()->status,
            $patients->last()->full_name,
            $patients->last()->email,
            $patients->last()->dob,
            $patients->last()->gender,
            $patients->last()->status,
        ]);
});

it('shows a the patient details', function () {

    // Arrange
    $patient = Patient::factory()->create();

    // Act & Assert
    get(route('patients.details', $patient))
        ->assertOk()
        ->assertSeeText([
            $patient->first()->full_name,
            "(#".$patient->first()->id.")",
            $patient->first()->email,
            $patient->first()->dob,
            $patient->first()->gender,
            $patient->first()->status,
        ]);
});
