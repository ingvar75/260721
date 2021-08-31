<?php

declare(strict_types=1);

const BASIC_SALARY = 1000;

$u1 = calcSalary('Dmytro', 2);
echo $u1;
echo calcSalary('Vasya', 0.3, true);

//$userName = 'Dmytro';
//var_dump($userAge);

function calcSalary(string $userName, float $userCoefficient, bool $withBonus = false): string
{
//    $userAge = 32;
//    var_dump($userName);
    $salary = BASIC_SALARY * $userCoefficient;
    if ($withBonus) {
        $salary *= 1 + random_int(5, 10) / 100;
    }

    return "Salary for {$userName} is {$salary}<br>";
}

echo calcSalary('Hanna', 3.4, true);
echo calcSalary('Ivan', 1);

//var_dump($userAge);

function sum(string $message, string $author, int ...$numbers): string
{
    $result = $message . array_sum($numbers);
    if ($author) {
        $result .= ' by ' . $author;
    }

    return $result;
}

echo sum('Sum of numbers is: ', '', 1, 2, 4, 100, 4, 84, 3), '<br>';

function printString(string $name = 'Anon', int $age = 69, string $job = 'PHP Dev'): void
{
    var_dump(__FUNCTION__);
    echo "{$job} {$name} {$age} years old<br>";
}

printString();
printString('Anon', 69, 'JS Dev'); // < PHP 8
printString(job: 'HTML Coder'); // PHP 8+

function arrayMultiply(array &$numbers, float $coefficient): array
{
    var_dump(__FUNCTION__);
    foreach ($numbers as &$value) {
        $value *= $coefficient;
    }

    return $numbers;
}

$a = [1, 2, 4, 5, 9];
arrayMultiply($a, 2);
var_dump($a);