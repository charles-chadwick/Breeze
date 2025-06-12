<?php

namespace App\Http\Controllers;

use App\Models\Appointment;

class AppointmentsController extends Controller
{
    public function index()
    {

        return view('appointments.index', [
            'appointments' => Appointment::status()
                ->get(),
        ]);
    }
}
