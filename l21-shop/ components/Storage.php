<?php

namespace components;

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
        $parts = explode('.', $key);
        $data = $this->data;
        foreach ($parts as $index) {
            if (!array_key_exists($index, $data)) {
                return $default;
            }

            $data = $data[$index];
        }

        return $data;
    }

    public function all(): array
    {
        return $this->data;
    }
}