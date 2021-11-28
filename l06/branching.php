<?php

if (1 > 0) {
    echo '1 is greater then 0<br>';
}

$v1 = random_int(0, 5);
var_dump($v1);
if ($v1 === 1) {
    echo 'Dima is good<br>';
} elseif ($v1 === 2) {
    echo 'Dima is not very good<br>';
} elseif ($v1 === 0 || $v1 === 3) {
    echo 'Dima is here<br>';
} else {
    echo 'Dima is very good<br>';
}

switch ($v1) {
    case 1:
        echo 'Dima is good<br>';
        break;
    case 2:
        echo 'Dima is not very good<br>';
        break;
    case 0:
    case 3:
        echo 'Dima is here<br>';
        break;
    default:
        echo 'Dima is very good<br>';
}

echo $v1 >= 3 ? 'Dima is coding now<br>' : 'Dima is sleeping<br>';

//$v2 = 'Test data<br>';
$v2 = '';
echo $v2 ?: 'Qwerty<br>';

$v4 = 'OK';
//$v3 = isset($v4) ? $v4 : 'FAIL';
$v3 = $v4 ?? 'FAIL';
echo $v3;