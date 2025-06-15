<?php

namespace App\Enums;

enum RouteOfAdministration: string
{
    case Oral = 'Oral';
    case Sublingual = 'Sublingual';
    case Buccal = 'Buccal';
    case Inhalation = 'Inhalation';
    case Nasal = 'Nasal';
    case Ophthalmic = 'Ophthalmic';
    case Otic = 'Otic';
    case Topical = 'Topical';
    case Transdermal = 'Transdermal';
    case Intravenous = 'Intravenous';
    case Intramuscular = 'Intramuscular';
    case Subcutaneous = 'Subcutaneous';
    case Intradermal = 'Intradermal';
    case Rectal = 'Rectal';
    case Vaginal = 'Vaginal';
    case Intraarticular = 'Intraarticular';
    case Intrathecal = 'Intrathecal';
    case Epidural = 'Epidural';
    case Urethral = 'Urethral';
    case Implant = 'Implant';
}
