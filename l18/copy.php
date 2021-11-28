<?php

class Student
{
    public string $university;
    public string $faculty;
    public string $group;
    public string $name;

    function goToSleep(): string
    {
        return "Student {$this->name} is sleeping";
    }
}

$student = new Student();
$student->university = 'NAU';
$student->faculty = 'FEL';
$student->group = 'FEL-116';

$hanna = clone $student;
$hanna->name = 'Hanna Montana';

$oleg = clone $student;
$oleg->name = 'Oleg Skripka';
