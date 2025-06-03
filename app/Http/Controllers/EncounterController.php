<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class EncounterController extends Controller
{
    public function __invoke(Patient $patient)
    {
        $encounters = $patient->encounters()
            ->filterByStatus()
            ->orderBy(request('order_by', 'date_of_service'), request('order_direction', 'asc'))
            ->get();

        return view('encounters.index', [
            'encounters' => $encounters,
        ]);
    }
}
