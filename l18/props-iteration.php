<?php

class People
{
    public string $name = 'Test Name';
    public int $age = 18;
    protected string $sex = 'male';
    private string $gender = 'Androgyne';

    public function iterateAll()
    {
        foreach ($this as $property => $value) {
            echo "{$property}: {$value}<br>";
        }
    }
}

class Male extends People
{
    public function iterate()
    {
        foreach ($this as $property => $value) {
            echo "{$property}: {$value}<br>";
        }
    }
}

$male = new Male();
foreach ($male as $property => $value) {
    echo "{$property}: {$value}<br>";
}

echo '<hr>';

$male = new Male();
$male->iterate();

echo '<hr>';

$male->iterateAll();