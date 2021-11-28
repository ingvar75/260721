<?php

function getArray(): array
{
    return [
        'qwerty',
        'test',
        [1, 2, 3],
    ];
}

var_dump(getArray()[0]);

echo '<hr>';

//$a = getArray()[0];
//$b = getArray()[1];
//$c = getArray()[2];

//list($a, $b, $c) = getArray();

[$a, $b, $c] = getArray();

var_dump($a, $b, $c);

echo '<hr>';

function test(): int
{
    static $counter = 0;

    echo random_int(0, 10), '<br>';

    $counter++;
    return $counter;
}

var_dump(
    test(),
    test(),
    test(),
    test(),
    test(),
    test(),
    test(),
    test(),
);
