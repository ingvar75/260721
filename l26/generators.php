<?php

function getNumbers(int $min, int $max)
{
//    $result = [];
//    for ($i = $min; $i <= $max; $i++) {
//        if ($i % 2 === 0) {
//            $result[] = $i;
//        }
//    }
//
//    return $result;

    for ($i = $min; $i <= $max; $i++) {
        if ($i % 2 === 0) {
            yield $i;
        }
    }
}

foreach (getNumbers(PHP_INT_MIN, PHP_INT_MAX) as $number) {
    echo $number, PHP_EOL;
}