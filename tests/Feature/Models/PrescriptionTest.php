<?php

use App\Enums\UserRole;
use App\Models\Medication;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\User;

it('saves a prescription', function () {

    $patient = Patient::factory()
        ->create();
    $medication = Medication::factory()
        ->create(['generic_name' => 'Oxycodone']);
    $prescriber = User::factory()
        ->create(['role' => UserRole::Doctor]);

    $prescription = Prescription::factory()
        ->create(['patient_id' => $patient->id,
            'medication_id' => $medication->id,
            'prescriber_id' => $prescriber->id,
        ]);

    expect($prescription->prescriber)
        ->toBeInstanceOf(User::class)
        ->and($prescription->medication)
        ->toBeInstanceOf(Medication::class)
        ->and($prescription->patient)
        ->toBeInstanceOf(Patient::class);
});
