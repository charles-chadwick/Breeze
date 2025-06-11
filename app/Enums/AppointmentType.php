<?php

namespace App\Enums;

enum AppointmentType: string
{
    case HomeVisit = 'Home Visit';
    case OfficeVisit = 'Office Visit';
    case VideoVisit = 'Video Visit';
    case PhoneVisit = 'Phone Visit';
}
