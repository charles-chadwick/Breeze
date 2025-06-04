<?php

use App\Models\Encounter;
use App\Models\Patient;
use App\Models\User;

it('has a patient', function () {

    $encounter = Encounter::factory()
        ->create([
            'patient_id' => Patient::factory()
                ->create(),
        ]);

    expect($encounter->patient)
        ->toBeInstanceOf(Patient::class);
});

it('has users', function () {

    $encounter = Encounter::factory()
        ->has(User::factory()
            ->count(3))
        ->create();

    expect($encounter->users)
        ->toHaveCount(3)
        ->each->toBeInstanceOf(User::class);
});
