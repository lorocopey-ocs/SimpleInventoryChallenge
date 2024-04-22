<?php

namespace Core;

class Validator
{
    public static function string(string $value, int $min = 1, float $max = INF): bool
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function number(string $value): bool
    {
        return is_numeric($value);
    }

    public static function empty(string $value): bool
    {
        return empty($value);
    }
}