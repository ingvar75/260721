<?php

namespace helpers;

class ArraysHelper
{
    public static function find(array $data, string $key, mixed $default = null): mixed
    {
        $parts = explode('.', $key);
        foreach ($parts as $index) {
            if (!array_key_exists($index, $data)) {
                return $default;
            }

            $data = $data[$index];
        }

        return $data;
    }
}