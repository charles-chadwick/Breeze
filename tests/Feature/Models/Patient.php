<?php

use App\Models\Patient;

it('has a fully formatted name attribute', function () {

    // Arrange
    $first_patient = Patient::factory()->create([
        'prefix' => 'Mr',
        'first_name' => 'Homer',
        'middle_name' => 'Jay',
        'last_name' => 'Simpson',
        'suffix' => 'Esq',
    ]);

    $second_patient = Patient::factory()->create([
        'prefix' => '',
        'first_name' => 'Barnard',
        'middle_name' => '',
        'last_name' => 'Gumble',
        'suffix' => '',
    ]);

    // Act & Assert
    expect($first_patient)
        ->toBeInstanceOf(Patient::class)
        ->and($first_patient->full_name)
        ->toEqual('Mr Homer Jay Simpson Esq')
        ->and($second_patient->full_name)
        ->toEqual('Barnard Gumble');

});

it('has a fully formatted date of birth', function () {

    // Arrange
    $patient = Patient::factory()->create([
        'dob' => '1980-01-01',
    ]);

    // Act & Assert
    expect($patient)
        ->toBeInstanceOf(Patient::class)
        ->and($patient->dob)
        ->toEqual('01/01/1980');
});
