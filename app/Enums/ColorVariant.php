<?php

enum ColorVariant: string
{
    case Blue = 'blue';
    case Green = 'green';
    case Purple = 'purple';
    case Orange = 'orange';

    public function twBackgroundColor(): string
    {
        return match ($this) {
            self::Blue => 'bg-blue-500',
            self::Green => 'bg-green-500',
            self::Purple => 'bg-purple-500',
            self::Orange => 'bg-orange-500',
        };
    }
}
