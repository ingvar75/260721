<?php

namespace components;

use helpers\ArraysHelper;
use RuntimeException;

class Session
{
    private const FLASH_KEY = 'flashes';

    public function __construct()
    {
        if (empty(session_id())) {
            session_start();
        }
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return ArraysHelper::find($_SESSION, $key, $default);
    }

    public function set(string $key, mixed $value): self
    {
        $_SESSION[$key] = $value;
        return $this;
    }

    public function add(string $key, mixed $value): self
    {
        if (!isset($_SESSION[$key])) {
            $_SESSION[$key] = [];
        }

        if (!is_array($_SESSION[$key])) {
            throw new RuntimeException('Storage data is not array');
        }

        $_SESSION[$key][] = $value;
        return $this;
    }

    public function remove(string $key): self
    {
        if (array_key_exists($key, $_SESSION)) {
            unset($_SESSION[$key]);
        }
        return $this;
    }

    public function addFlash(string $key, mixed $value): self
    {
        $_SESSION[self::FLASH_KEY][$key] = $value;
        return $this;
    }

    public function getFlash(string $key, mixed $default = null): mixed
    {
        if (array_key_exists($key, $_SESSION[self::FLASH_KEY])) {
            $value = $_SESSION[self::FLASH_KEY][$key];
            unset($_SESSION[self::FLASH_KEY][$key]);
            return $value;
        }

        return $default;
    }

    public function destroy(): void
    {
        session_destroy();
    }
}