<?php

class Student
{
    var string $name;
    var int $age;
    var DateTime $birthday;
    var bool $isTalky;

    function goToSleep(): string
    {
        return "Student {$this->name} is sleeping";
    }

    function toTalk(): string
    {
        if ($this->isTalky) {
            return "Student {$this->name} is talking";
        }

        return "Student {$this->name} is going out";
    }
}

$student = new Student();
$student->name = 'John Dou';
$student->age = 22;
$student->birthday = new DateTime('1999-05-24');
$student->isTalky = false;

$student1 = new Student();
$student1->name = 'Hanna Lee';
$student1->age = 21;
$student1->birthday = new DateTime('2000-12-11');
$student1->isTalky = true;

var_dump($student, $student1);
var_dump($student->name, $student1->name);
var_dump($student->goToSleep(), $student1->goToSleep());
var_dump($student->toTalk(), $student1->toTalk());