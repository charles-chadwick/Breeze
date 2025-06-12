<?php

namespace App\Enums;

enum DoseForm: string
{
// form ENUM('tablet', 'capsule', 'liquid', 'injection', 'patch', 'inhaler'),
    case Tablet    = "Tablet";
    case Capsule   = "Capsule";
    case Liquid    = "Liquid";
    case Injection = "Injection";
    case Pellet    = "Pellet";
    case Patch     = "Patch";
    case Inhaler   = "Inhaler";
}
