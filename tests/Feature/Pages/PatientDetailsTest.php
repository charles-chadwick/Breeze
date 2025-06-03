<?php

namespace Tests\Feature\Pages;

use App\Models\Patient;

use function Pest\Laravel\get;

it('can view patient details', function () {

    // Arrange
    $patient = Patient::factory()
        ->create([
            'first_name' => 'Fred',
            'middle_name' => 'Rockhead',
            'last_name' => 'Flintstone',
            'dob' => '1980-01-01',
            'gender' => 'Male',
            'status' => 'Active',
        ]);

    // Act & Assert
    get(route('patients.details', $patient))
        ->assertOk()
        ->assertSeeText($patient->first_name.' '.$patient->middle_name.' '.$patient->last_name)
        ->assertSeeText($patient->dob)
        ->assertSeeText($patient->gender)
        ->assertSeeText($patient->email)
        ->assertSeeText('Active');
});
