<?php

use App\Enums\EncounterStatus;
use App\Models\Encounter;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Sequence;

use function Pest\Laravel\get;

it('shows all patient encounters', function () {

    // Arrange
    $patient = Patient::factory()
        ->has(Encounter::factory()
            ->count(2))
        ->create();

    // Act & Assert
    get(route('patients.encounters', $patient))
        ->assertOk()
        ->assertSeeText($patient->encounters->first()->title)
        ->assertSeeText("{$patient->encounters->count()} Encounters");
});

it('only shows signed patient encounters', function () {

    // Arrange
    $patient = Patient::factory()
        ->has(Encounter::factory()->state(new Sequence(
            ['status' => EncounterStatus::Signed],
            ['status' => EncounterStatus::Unsigned],
        ))
            ->count(2))
        ->create();

    // Act & Assert
    get(route('patients.encounters', ['patient' => $patient, 'status' => EncounterStatus::Signed]))
        ->assertOk()
        ->assertSeeText($patient->encounters->first()->status)
        ->assertDontSeeText($patient->encounters->last()->status);
});

it('only shows patient encounters of a specific type', function () {

    // Arrange
    $patient = Patient::factory()
        ->has(Encounter::factory()->state(new Sequence(
            ['type' => 'Should See'],
            ['type' => 'Should Not See'],
        ))
            ->count(2))
        ->create();

    // Act & Assert
    get(route('patients.encounters', ['patient' => $patient, 'type' => 'Should See']))
        ->assertOk()
        ->assertSeeText($patient->encounters->first()->title)
        ->assertDontSeeText($patient->encounters->last()->title);
});

it('shows patient encounters in descending order', function () {

    // Arrange
    $patient = Patient::factory()
        ->has(Encounter::factory()
            ->state(new Sequence(
                ['date_of_service' => Carbon::yesterday()],
                ['date_of_service' => Carbon::today()]
            ))
            ->count(2))
        ->create();

    // Act & Assert
    get(route('patients.encounters', $patient))
        ->assertOk()
        ->assertSeeTextInOrder([
            $patient->encounters->first()->date_of_service,
            $patient->encounters->last()->date_of_service,
        ]);
});
