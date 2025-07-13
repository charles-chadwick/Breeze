<?php

namespace App\Enums;

enum UserStatus: string
{
    use EnumToArray;

    case Active = 'Active';
    case Inactive = 'Inactive';
}
