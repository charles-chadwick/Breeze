<?php

use App\Enums\PatientStatus;
use App\Models\Medication;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;

use function Pest\Laravel\get;

it('shows a list of patients', function () {

    // Arrange
    $patients = Patient::factory()
        ->count(2)
        ->create();

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

it('shows only active patients', function () {

    // Arrange
    $patients = Patient::factory()
        ->state(new Sequence(['status' => PatientStatus::Active],
            ['status' => PatientStatus::Inactive], ))
        ->count(2)
        ->create();

    // Act & Assert
    get(route('patients.index', ['status' => PatientStatus::Active]))
        ->assertOk()
        ->assertSeeText([
            $patients->first()->full_name,
            $patients->first()->status,
        ])
        ->assertDontSeeText([
            $patients->last()->full_name,
            $patients->last()->status,
        ]);
});

it('shows the patient details', function () {

    // Arrange
    $patient = Patient::factory()
        ->create();

    // Act & Assert
    get(route('patients.details', $patient))
        ->assertOk()
        ->assertSeeText([
            $patient->first()->full_name,
            '(#'.$patient->first()->id.')',
            $patient->first()->email,
            $patient->first()->dob,
            $patient->first()->gender,
            $patient->first()->status,
        ]);
});

it('shows a list of the patients medications', function () {

    $patient = Patient::factory()
        ->create();
    $medication = Medication::factory()
        ->state(new Sequence([
            'generic_name' => 'Oxycodone',
            'brand_name' => 'Vicodin',
        ], [
            'generic_name' => 'Alprazolam',
            'brand_name' => 'Xanax',

        ], ))
        ->count(2)
        ->create();
    $prescriber = User::factory()
        ->create();

    $prescriptions = Prescription::factory()
        ->state(new Sequence(['medication_id' => $medication->first()->id],
            ['medication_id' => $medication->last()->id]))
        ->count(2)
        ->create([
            'patient_id' => $patient->id,
            'prescriber_id' => $prescriber->id,
        ]);

    get(route('patients.medications', $patient))
        ->assertOk()
        ->assertSeeText([
            $prescriptions->first()->medication->generic_name,
            $prescriptions->first()->medication->brand_name,
            'Prescribed '.$prescriptions->first()->prescribed_at.' by '.$prescriptions->first()->prescriber->full_name,

            $prescriptions->last()->medication->generic_name,
            $prescriptions->last()->medication->brand_name,
            'Prescribed '.$prescriptions->last()->prescribed_at.' by '.$prescriptions->last()->prescriber->full_name,
        ]);

});
