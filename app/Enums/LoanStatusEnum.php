<?php

namespace App\Enums;

enum LoanStatusEnum: string
{
    case Inactive = '0';
    case Active = '1';
    case Finished = '2';
    case Terminated = '3';
    case Cancelled = '4';
}
