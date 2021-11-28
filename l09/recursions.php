<?php

$counter = 0;

const NUMBER = 2;
const POWER = 10;

function power(int $number, int $power): int|float
{
    global $counter;
    $counter++;

    if ($power === 0) {
        return 1;
    }

    if ($power === 1) {
        return $number;
    }

    if ($power % 2 === 0) {
        $result = power($number, $power / 2);
        return $result * $result;
    }

    return $number * power($number, $power - 1);

    // 3 ^ 3
    // 3 * 3 ^ 2
    // 3 * 3 * 3 ^ 1

    // moves down
    // 3 ^ 3 = 3 * 3 ^ 2     on hold
    // 3 ^ 2 = 3 * 3 ^ 1     on hold
    // 3 ^ 1 = 3

    // moves up
    // 3 ^ 3 = 3 * 9 = 27
    // 3 ^ 2 = 3 * 3 = 9
    // 3 ^ 1 = 3
}

var_dump(NUMBER ** POWER, power(NUMBER, POWER), $counter);

echo '<hr>';
echo '<img src="fib.png" alt="Fibpnacci">';

$counter = 0;

function fibonacci(int $n): int|float
{
    global $counter;
    $counter++;

//    if ($n === 1 || $n === 2) {
//        return 1;
//    }

    static $storage = [
        1 => 1,
        2 => 1,
    ];

    if (array_key_exists($n, $storage)) {
        return $storage[$n];
    }

    $result = fibonacci($n - 1) + fibonacci($n - 2);

    $storage[$n] = $result;

    return $result;

    // 1 1 2 3 5 8 13 21
    // 1 2 3 4 5 6 7  8
    //                                     (5 = 5)
    //              (4 = 3)                   +                            (3 = 2)
    //       (3 = 2)      +       (2 = 1)                        (2 = 1)       +        (1 = 1)
    //   (2 = 1)   +   (1 = 1)
}

var_dump(
    fibonacci(5),
    $counter
);


$array = [
    'test' => 123123,
    'qwerty' => 'qqqq',
    'data' => [
        1, 2, 3,
    ],
    'q' => [
        'w' => [1, 2],
        'r' => [1, 2],
    ],
];

echo '<hr>';

// HW
// написать рекурсивную функцию для просчета количества элементов в массиве
var_dump(count($array, true));
// написать рекурсивную функцию для вывода массива на экран
echo '<pre>';
print_r($array);
echo '</pre>';
