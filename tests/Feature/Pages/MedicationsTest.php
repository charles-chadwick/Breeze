<?php

use App\Models\Medication;
use function Pest\Laravel\get;

it('shows a list of medications', function () {

    // Arrange
    $medications = Medication::factory()->count(2)->create();

    // Act & Assert
    get(route('medications.index'))
        ->assertOk()
        ->assertSeeText([
            $medications->first()->generic_name,
            $medications->first()->strength,
            $medications->first()->dose_form,
            $medications->last()->generic_name,
            $medications->last()->strength,
            $medications->last()->dose_form
        ]);
});
