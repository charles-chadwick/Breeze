<?php

namespace App\Enums;

enum MedicationFrequency: string
{
    use EnumToArray;
    case QD = 'Once daily (QD)';
    case BID = 'Twice daily (BID)';
    case TID = 'Three times daily (TID)';
    case QID = 'Four times daily (QID)';
    case QHS = 'Every night at bedtime (QHS)';
    case QAM = 'Every morning (QAM)';
    case QPM = 'Every evening (QPM)';
    case Q4H = 'Every 4 hours (Q4H)';
    case Q6H = 'Every 6 hours (Q6H)';
    case Q8H = 'Every 8 hours (Q8H)';
    case Q12H = 'Every 12 hours (Q12H)';
    case QOD = 'Every other day (QOD)';
    case QWK = 'Once weekly (QWK)';
    case PRN = 'As needed (PRN)';
    case STAT = 'Immediately (STAT)';
    case AC = 'Before meals (AC)';
    case PC = 'After meals (PC)';
    case HS = 'At bedtime (HS)';
}
