<?php
static function () {
    var_dump(123);
};

$test = static function (int $min, int $max): void {
    var_dump(random_int($min, $max));
};
$test(2, 10);

$a = range(0, 20);

$a2 = array_filter(
    $a,
    static function(int $number): bool {
        return $number % 5 === 0;
    }
);
var_dump($a2);

$a3 = array_filter(
    $a2,
    static fn (int $number): bool => $number % 5 === 0
);
var_dump($a3);
