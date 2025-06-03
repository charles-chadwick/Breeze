<?php

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Sequence;

it('shows the properly formatted full name', function () {

    // Arrange
    $patients = Patient::factory()
        ->state(new Sequence([
            'last_name' => 'Simpson',
            'first_name' => 'Homer',
            'middle_name' => 'Jay',
        ], [
            'last_name' => 'Gumble',
            'first_name' => 'Barnard',
            'middle_name' => '',
            // deliberately put a blank space in
        ]))
        ->count(2)
        ->create();

    // Act & Assert
    expect($patients[0]->full_name)
        ->toBe('Homer Jay Simpson')
        ->and($patients[1]->full_name)
        ->toBe('Barnard Gumble');
});
