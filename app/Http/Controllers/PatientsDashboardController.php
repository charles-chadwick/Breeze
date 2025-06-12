<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class PatientsDashboardController extends Controller
{
    public function index()
    {
        $patients = Patient::status()->get();
        $headers = [
            'MRN',
            'Name',
            'Date of Birth',
            'Gender',
            'Status',
            'Email',
        ];

        return view('patients.index', compact('patients', 'headers'));
    }

    public function details(Patient $patient)
    {
        return view('patients.chart', compact('patient'));
    }

    public function medications(Patient $patient)
    {
        return view('patients.prescriptions', ['prescriptions' => $patient->prescriptions]);
    }
}
