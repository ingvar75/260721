<?php

$name = 'Dmytro';

function globalTest()
{
    global $name;
    $name = 'Alladin';
    unset($name);
//    var_dump($name);
}

globalTest();
var_dump($name);

function doNotDoThis()
{
    var_dump($GLOBALS['name']);
    $GLOBALS['name'] = 'Raja';
//    unset($GLOBALS['name']);
}
doNotDoThis();
//var_dump($name);

function printName(string $name): void
{
    $name = 'Abu';
    echo "<h1>{$name}</h1>";
    unset($name);
}
printName($name);
var_dump($name);

$a = [
    [
        'firstName' => 'Raja',
        'lastName' => 'Kotenko',
    ],
    [
        'firstName' => 'Ivan',
        'lastName' => 'Ivanov',
    ],
    [
        'firstName' => 'Raja',
        'lastName' => 'Lazarev',
    ],
    [
        'firstName' => 'Hanna',
        'lastName' => 'Montana',
    ],
];

$a2 = array_filter($a, static function (array $person) use ($name): bool {
    $name = 'Ivan';
    $result = $person['firstName'] === $name;
    unset($name);

    return $result;
});
var_dump($a2, $name);