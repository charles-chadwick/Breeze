<?php

namespace App\Http\Controllers;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;

class AppointmentsController extends Controller
{
    public function index()
    {
        $appointment_status_options = [];
        foreach (AppointmentStatus::cases() as $appointment_status) {
            $appointment_status_options[ $appointment_status->value ] = $appointment_status->name;
        }
        return view('appointments.index', [
            'appointments'               => Appointment::status()
                                                       ->get(),
            'appointment_status_options' => $appointment_status_options
        ]);
    }
}
