<?php

use App\Enums\PatientStatus;
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
            $patients->last()->status
        ]);
});
