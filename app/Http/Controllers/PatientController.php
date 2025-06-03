<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class PatientController extends Controller
{
    public function index()
    {

    }

    public function details(Patient $patient)
    {
        return view('patients.details', compact('patient'));
    }
}
