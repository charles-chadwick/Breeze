<?php

namespace App\Enums;

enum AppointmentStatus: string
{
    case Confirmed = 'Confirmed';
    case Cancelled = 'Cancelled';
    case Pending = 'Pending';
    case Completed = 'Completed';
    case Rescheduled = 'Rescheduled';
}
