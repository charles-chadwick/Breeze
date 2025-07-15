<?php

namespace App\Enums;

enum DiscussionUserStatus: string
{
    use EnumToArray;

    case Read = 'Read';
    case Unread = 'Unread';
}
