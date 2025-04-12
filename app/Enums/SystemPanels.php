<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum SystemPanels: string implements HasLabel
{
    case AdminPanel = 'admin';
    case InstructorPanel = 'instructor';
    case StudentPanel = 'student';

    public function getLabel(): ?string
    {
        return $this->value;
    }
}
