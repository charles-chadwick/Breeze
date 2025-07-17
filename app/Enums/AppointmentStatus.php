<?php

namespace App\Enums;

enum AppointmentStatus: string
{
    use EnumToArray;
    case Completed   = 'Completed';
    case Confirmed   = 'Confirmed';
    case Cancelled   = 'Cancelled';
    case Rescheduled = 'Rescheduled';
}
