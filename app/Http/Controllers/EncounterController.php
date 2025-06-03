<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class EncounterController extends Controller
{
    public function __invoke(Patient $patient)
    {
        $encounters = $patient->encounters()
                              ->orderBy('date_of_service')
                              ->get();

        return view('encounters.index', [
            'encounters' => $encounters,
        ]);
    }
}
