<?php

namespace Tests\Feature\Pages;

use App\Models\Patient;

use Illuminate\Database\Eloquent\Factories\Sequence;
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

it('can view a list of active patients', function () {

    // Arrange
    $patients = Patient::factory()
        ->state(new Sequence(['status' => 'Active'], ['status' => 'Inactive']))
        ->count(2)
        ->create();

    // Act & Assert
    get(route('patients.index'))
        ->assertOk()
        ->assertSeeText($patients->first()->full_name)
        ->assertDontSeeText($patients->last()->full_name);
});
