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
        ->assertSeeText($patient->encounters->first()->title);
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
