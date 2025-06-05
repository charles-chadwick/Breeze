<?php

namespace App\Enums;

enum DiscussionStatus: string
{
    case Unread = "Unread";
    case Read = "Read";
    case Draft = "Draft";
}
