<?php

namespace App\Enums;

enum DrugSchedule: string
{
    case Schedule_I   = 'Schedule_I';     // High abuse, no accepted medical use (e.g., heroin)
    case Schedule_II  = 'Schedule_II';    // High abuse, severe dependence risk (e.g., oxycodone)
    case Schedule_III = 'Schedule_III';   // Moderate to low physical dependence (e.g., ketamine)
    case Schedule_IV  = 'Schedule_IV';    // Low abuse and dependence risk (e.g., alprazolam)
    case Schedule_V   = 'Schedule_V';     // Lower potential for abuse (e.g., cough syrups with codeine)
    case Unscheduled  = 'Unscheduled';    // Not a controlled substance (e.g., ibuprofen)
}
