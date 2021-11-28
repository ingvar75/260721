<?php

class People
{
    var string $name;
    var DateTime $birthday;
    var bool $isTalky;

    function goToSleep(): string
    {
        return "{$this->name} is sleeping";
    }

    function toTalk(): string
    {
        if ($this->isTalky) {
            return "{$this->name} is talking";
        }

        return "{$this->name} is going out";
    }

    function getAge(): int
    {
        return (new DateTime('now'))->diff($this->birthday)->y;
    }
}

class Student extends People
{
    var string $faculty;
}

class Engineer extends People
{
    var string $profile;

    function goToWork(): string
    {
        return "Engineer {$this->name} is working";
    }
}

$student = new Student();
$student->name = 'John Dou';
$student->birthday = new DateTime('1999-05-24');
$student->isTalky = false;
$student->faculty = 'Economics';

var_dump($student, $student->toTalk(), $student->goToSleep(), $student->getAge());

$engineer = new Engineer();
$engineer-> name = 'Vasya';
$engineer->birthday = new DateTime('1971-07-01');
//    (new DateTime('now'))->modify("-{$engineer->age} years");
$engineer->isTalky = false;
$engineer->profile = 'Senior PHP Engineer';

var_dump($engineer, $engineer->goToWork(), $engineer->goToSleep(), $engineer->getAge());

var_dump(
    $engineer instanceof Engineer,
    $engineer instanceof Student,
    $engineer instanceof People
);

$people = new People();
var_dump($people instanceof Engineer);