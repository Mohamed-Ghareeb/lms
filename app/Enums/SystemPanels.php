<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum SystemPanels: string implements HasLabel
{
    case AdminPanel = 'admin';

    public function getLabel(): ?string
    {
        return $this->value;
    }
}
