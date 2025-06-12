<?php

namespace App\Http\Controllers;

use App\Models\Medication;

class MedicationsController extends Controller
{
    public function index()
    {
        $medications = Medication::get();
        return view('medications.index', compact('medications'));
    }
}
