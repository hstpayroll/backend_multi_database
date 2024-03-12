<?php

namespace App\Enums;

enum LoanStatusEnum
{
    case Active = 'active';
    case Inactive = 'inactive';
    case Finished = 'finished';
    case Terminated = 'terminated';
    case Cancelled = 'cancelled';
}
