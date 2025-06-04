<?php

namespace App\Enums;

enum UserRole: string
{
    case Super = 'Super';
    case Doctor = 'Doctor';
    case Nurse = 'Nurse';
    case MedicalAssistant = 'Medical Assistant';
    case Staff = 'Staff';
}
