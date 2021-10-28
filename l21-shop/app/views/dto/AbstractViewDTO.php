<?php

namespace app\views\dto;

use InvalidArgumentException;

abstract class AbstractViewDTO
{
    public function __construct(array $variables)
    {
        foreach ($variables as $name => $value) {
            if (!property_exists($this, $name)) {
                $class = static::class;
                throw new InvalidArgumentException("Property '{$name}' not exists in {$class}");
            }

            $this->{$name} = $value;
        }
    }
}