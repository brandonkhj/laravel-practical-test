<?php

namespace App\Enums;

use ArchTech\Enums\Values;

enum InputType: string
{
    use Values;

    case Name = 'name';
    case Phone = 'phone';
    case Dob = 'dob';
    case Gender = 'gender';
}
