
<?php

$v1 = 1 > 0 && 3 == true;
$v2 = 1 > 0 && 6 > 5 && 0 < 1 && 5 == 2;
var_dump($v1, $v2);

$v3 = 1 > 2 || 3 > 1;
var_dump($v3);

$v4 = 1 > 0 xor 4 > 2;
var_dump($v4);

$v5 = 1 > 0 && (4 < 1 || 5 > 2);
var_dump($v5);

$v6 = false;
$v7 = !$v6;
$v8 = false == $v6;

$v9 = null;
$v10 = !$v9;
$v11 = false == $v9;
var_dump($v7, $v8, $v10, $v11);