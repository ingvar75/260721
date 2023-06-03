<?php

$var = 'Test text';
$var = 111;
$var = 111.2;
$var = [1, 2];
var_dump(gettype($var));

var_dump(
    is_int('test'),
    is_int(22),
    is_float(3.5),
    is_float('3.5'),
    is_array('3.5'),
    is_array(['3.5']),
    is_numeric(22),
    is_numeric(2.2),
    is_numeric('22'),
    is_numeric('2.2'),
    is_numeric('rr')
);

echo '<hr>';

var_dump(
    (int)'test',
    (int)12.2,
    (int)'12.2',
    (int)'test 123',
    (int)'123 test',
    (int)' 123 test',
    (bool)0,
    (bool)-144,
    (bool)'',
    (bool)[],
    (bool)'test',
    (bool)' ',
    (bool)'0',
    (bool)'false',
);

echo '<hr>';

$var1 = false;
var_dump(
    empty(0),
    empty(''),
    empty('0'),
    empty($qqq)
);

echo '<hr>';

$var3 = null;
var_dump(
    isset($var1),
    isset($var2),
    isset($var3)
);