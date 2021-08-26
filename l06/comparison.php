<?php

$v1 = 1 > 2;
var_dump($v1);

$v2 = 'test' > 'qwerty';
$v3 = 'abc' > 'bcd';
var_dump($v2, $v3);

$v4 = '2020-01-03' < '2020-02-01';
var_dump($v4);

$v5 = 1 >= 1;
var_dump($v5);

$v6 = 123 == 222;
var_dump($v6);

$v7 = 123 === '123';
$v8 = 123 == '123';
$v9 = 123 == true;
$v10 = 123 === (int)'123';
$v11 = 123 === 124;
var_dump($v7, $v8, $v9, $v10, $v11);