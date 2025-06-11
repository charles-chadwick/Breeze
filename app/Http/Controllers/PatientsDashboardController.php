<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class PatientsDashboardController extends Controller
{
    public function index()
    {
        $patients = Patient::status()->get();

        return view('patients.index', compact('patients'));
    }

    public function details(Patient $patient)
    {
        return view('patients.details', compact('patient'));
    }
}
