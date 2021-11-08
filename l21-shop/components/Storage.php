<?php

namespace components;

use helpers\ArraysHelper;

class Storage
{
    private array $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function set(string $key, mixed $value): self
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return ArraysHelper::find($this->data, $key, $default);
    }

    public function all(): array
    {
        return $this->data;
    }
}