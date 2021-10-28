<?php

class People
{
    public string $name;
    public DateTime $birthday;

    public function goToSleep(): string
    {
        return "{$this->name} is sleeping";
    }

    public function getAge(): int
    {
        return $this->calcAge();
    }

    public function setBirthday(DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    private function calcAge(): int
    {
        return (new DateTime('now'))->diff($this->birthday)->y;
    }
}

class Engineer extends People
{
    public string $profile;

    public function goToWork(): string
    {
        return "Engineer {$this->name} is working";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}

$engineer = new Engineer();
$engineer->setName('Mark Dacascos');
$engineer->setBirthday(new DateTime('1964-02-26'));
$engineer->profile = 'movie';

var_dump($engineer, $engineer->getName());