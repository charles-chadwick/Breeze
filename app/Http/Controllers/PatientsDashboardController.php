<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class PatientsDashboardController extends Controller
{
    public function index()
    {
        $patients = Patient::all();

        return view('patients.index', compact('patients'));
    }
}
