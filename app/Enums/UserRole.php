<?php

namespace App\Enums;

enum UserRole: string
{
    use EnumToArray;

    case Administrator = 'Administrator';
    case Doctor = 'Doctor';
    case Nurse = 'Nurse';
    case Staff = 'Staff';
    case Patient = 'Patient';
}
