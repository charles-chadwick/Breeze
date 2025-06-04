<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class AppointmentController extends Controller
{
    public function __invoke(Patient $patient)
    {
        $appointments = $patient->appointments()
            ->filterByStatus()
            ->filterByType()
            ->orderBy(request('order_by', 'date_and_time'), request('order_direction', 'asc'))
            ->get();

        return view('appointments.index', [
            'appointments' => $appointments,
        ]);
    }
}
