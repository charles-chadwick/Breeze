<?php

use App\Models\Discussion;
use App\Models\Patient;
use function Pest\Laravel\get;

it('shows patient discussions', function () {

    // Arrange
    $patient = Patient::factory()
                      ->has(Discussion::factory())
                      ->create();

    // Act & Assert
    get(route('patients.discussions', $patient))
        ->assertOk()
        ->assertSeeText($patient->discussions->first()->title);
});
