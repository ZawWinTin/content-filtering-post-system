<?php

namespace App\Traits;

trait EnumToArray
{
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function array(): array
    {
        return array_combine(self::values(), self::names());
    }

    public static function case($value)
    {
        foreach (self::cases() as $case) {
            if ($case->value == $value) {
                return $case;
            }
        }

        return null;
    }
}
