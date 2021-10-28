<?php

abstract class Human
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function makeAction(): void;
}

class Student extends Human
{
    public function makeAction(): void
    {
        echo 'Study Hard<br>';
    }
}

class Programmer extends Human
{
    public function makeAction(): void
    {
        echo 'Write clean code<br>';
    }
}

$humans = [
    new Student('Nikolas'),
    new Programmer('John'),
    new Student('Ariel'),
    new Programmer('Pokahontas'),
];

foreach ($humans as $human) {
    HumanProcessor::doSmth($human);
}

class HumanProcessor
{
    public static function doSmth(Human $human)
    {
        $human->makeAction();
    }
}


abstract class A
{
    abstract public function a(): void;
}

class B extends A
{
    public function a(): void
    {
    }
}

class C extends B
{
}

$c = new C();
$c->a();