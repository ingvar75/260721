<?php

define('TEST', 123);
//define('TEST', 1234);
var_dump(TEST);

const QWERTY = 333;
//const QWERTY = 3334;
//define('QWERTY', 1234);
var_dump(QWERTY);

const MY_COEFFICIENT = 1.2;
var_dump(MY_COEFFICIENT);

var_dump(__LINE__);
var_dump(__LINE__, __FILE__, __DIR__);

$line = __LINE__;
var_dump($line);