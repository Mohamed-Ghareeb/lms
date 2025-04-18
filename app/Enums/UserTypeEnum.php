<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum UserTypeEnum: string implements HasLabel
{
    case Student = 'student';
    case Instructor = 'instructor';
    case Admin = 'admin';

    public function getLabel(): ?string
    {
        return __('main.user_types.' . $this->value);
    }
}
