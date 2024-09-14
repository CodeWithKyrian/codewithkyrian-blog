<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ProjectType: int implements HasColor, HasLabel
{
    case REGULAR = 0;
    case OPEN_SOURCE = 1;

    public function getLabel(): ?string
    {
        return match ($this) {
            self::REGULAR => 'Regular',
            self::OPEN_SOURCE => 'Open Source',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::REGULAR => 'info',
            self::OPEN_SOURCE => 'success',
        };
    }
}
