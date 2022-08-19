<?php

namespace App\Rules;

enum TypesCustomersSupported: string
{
    case COMMON = 'common';
    case SHOPKEEPER = 'shopkeeper';

    public static function each(): array
    {
        return [
            self::COMMON->value,
            self::SHOPKEEPER->value,
        ];
    }
}
