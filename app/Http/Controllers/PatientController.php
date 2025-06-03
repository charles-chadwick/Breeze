<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class PatientController extends Controller
{
    public function index() {
        $patients = Patient::where('status', 'Active')->get();
        return view('patients.index', compact('patients'));
    }

    public function details(Patient $patient)
    {
        return view('patients.details', compact('patient'));
    }
}
