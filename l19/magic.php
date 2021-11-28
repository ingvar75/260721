<?php

/**
 * @property int $test
 * @property string $qwerty
 */
class Magic
{
    private string $name;

    private array $storage = [];

    public function __construct(string $name)
    {
        $this->name = $name;
        echo "Hello, {$this->name}!<br>";
    }

    public function __set(string $key, mixed $value): void
    {
        $this->storage[$key] = $value;
    }

    public function __get(string $key): mixed
    {
        return $this->storage[$key] ?? null;
    }

    public function __isset(string $key): bool
    {
        return array_key_exists($key, $this->storage);
    }

    public function __sleep(): array
    {
        return ['name'];
    }

    public function __wakeup(): void
    {
        echo "Good morning, {$this->name}<br>";
    }

    public function __destruct()
    {
        echo "By, {$this->name}!<br>";
    }
}

$m = new Magic('Dmytro');
$m->test = 12;
$m->qwerty = 'Some string';
$s = serialize($m);
$m2 = unserialize($s);
var_dump($m, $m->test, isset($m->test), $s, $m2);