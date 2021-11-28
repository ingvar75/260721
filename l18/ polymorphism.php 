<?php

class People
{
    private string $name;

    public function goToSleep(): string
    {
        return "{$this->name} is sleeping";
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        $this->polyTest();
        return $this->name;
    }

    protected function polyTest(): void
    {
        var_dump(123);
    }
}

class Engineer extends People
{
    public function goToSleep(): string
    {
        $this->polyTest();
        return "Engineer {$this->getName()} is sleeping at work";
    }

    public function polyTest(): void
    {
        var_dump(321);
    }
}

$engineer = new Engineer();
$engineer->setName('Mark Dacascos');

var_dump($engineer, $engineer->goToSleep());