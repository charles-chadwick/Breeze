<?php

namespace Tests\Feature\Pages;

use App\Enums\PatientStatus;
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

it('can view a list of patients', function () {

    // Arrange
    $patients = Patient::factory()
        ->count(2)
        ->create(['status' => PatientStatus::Inactive]);

    // Act & Assert
    get(route('patients.index'))
        ->assertOk()
        ->assertSeeText([
            $patients->first()->full_name,
            $patients->last()->full_name,
        ]);
});

it('can view a list of patients by status', function () {

    // Arrange
    $patients = Patient::factory()
        ->state(new Sequence(
            ['status' => 'Inactive'], ['status' => 'Active'], ['status' => 'Prospective']))
        ->count(3)
        ->create();

    // Act & Assert
    get(route('patients.index', ['status' => [PatientStatus::Inactive, PatientStatus::Active]]))
        ->assertOk()
        ->assertSeeText(
            $patients[0]->full_name,
            $patients[1]->full_name,
        )->assertDontSeeText($patients[2]->full_name);
});
