<?php

$array = [
    'test' => 123,
    'data' => [
        123,
        333,
        [
            1,
            2,
            3,
        ],
    ],
];
$s = serialize($array);
var_dump($s);
$a = unserialize($s);
var_dump($a);

var_dump(
    count($a),
    count($a, COUNT_RECURSIVE)
);

$a2 = [1, 123, 55, 'test'];
var_dump($a2);
array_unshift($a2, 'qwertyy');
var_dump($a2);

array_push($a2, 'Dmytro');
$a2[] = 'Max';
var_dump($a2);

var_dump(
    array_key_exists('data', $a),
    array_key_exists('data2', $a),
    in_array(123, $a2),
    in_array('Max', $a2),
    in_array('Maxes', $a2),
);

$a3 = [1, 23, 3, 1, 23, 32];
var_dump($a3);
$a4 = array_unique($a3);
var_dump($a4);

$a5 = compact('a3', 's');
var_dump($a5);

$q = 123;
$a6 = [66, 'q' => 44, 'j' => 4];
extract($a6, EXTR_PREFIX_IF_EXISTS, 'skillup');
var_dump($q, $j, $skillup_q);