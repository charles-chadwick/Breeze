<?php

namespace App\Http\Controllers;

use App\Enums\PatientStatus;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index() {
        $patients = Patient::byStatus(request('status'))
                           ->orderBy(request('order_by', 'first_name'), request('order_direction', 'asc'))
                           ->get();
        return view('patients.index', compact('patients'));
    }

    public function details(Patient $patient)
    {
        return view('patients.details', compact('patient'));
    }
}
