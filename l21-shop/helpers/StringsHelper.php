<?php declare(strict_types=1);

namespace helpers;

class StringsHelper
{
    public static function camelize(string $string, string $delimiter): string
    {
        return str_replace($delimiter, '', ucwords($string, $delimiter));
    }
}