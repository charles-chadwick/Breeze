<?php

namespace App\Enums;

enum MedicationFrequency: string
{
    case QD = 'QD';       // Once daily
    case BID = 'BID';     // Twice daily
    case TID = 'TID';     // Three times daily
    case QID = 'QID';     // Four times daily
    case QHS = 'QHS';     // Every night at bedtime
    case QAM = 'QAM';     // Every morning
    case QPM = 'QPM';     // Every evening
    case Q4H = 'Q4H';     // Every 4 hours
    case Q6H = 'Q6H';     // Every 6 hours
    case Q8H = 'Q8H';     // Every 8 hours
    case Q12H = 'Q12H';   // Every 12 hours
    case QOD = 'QOD';     // Every other day
    case QWK = 'QWK';     // Once weekly
    case PRN = 'PRN';     // As needed
    case STAT = 'STAT';   // Immediately
    case AC = 'AC';       // Before meals
    case PC = 'PC';       // After meals
    case HS = 'HS';       // At bedtime
}
