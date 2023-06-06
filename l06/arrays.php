
<?php

$a1 = array(
    1,
    'test',
    array(
        'qqq',
        'lalala',
    ),
);
$a2 = [
    1,
    'test',
    [
        'qqq',
        'lalala',
    ],
];
var_dump($a1, $a2, $a2[1], $a2[2][1]);

$a2[] = 'qwerty';
$a2[42] = 'qqqqq';
$a2[] = 'fff';
$a2[2][] = 'ttt';
$a2[1] = 'TEST 2';
var_dump($a2);

unset($a2[42], $a2[2][0]);
var_dump($a2);

array_unshift($a2, '01');
array_unshift($a2[3], '007');
var_dump($a2);

$a3 = [
    'name' => 'Dmytro Kotenko',
    'age' => 32,
    'job' => 'Senior PHP Dev',
    'skills' => [
        'backend' => ['PHP', 'MySQL', 'C#'],
        'frontend' => ['JS', 'HTML', 'CSS'],
    ],
];
var_dump($a3, $a3['name'], $a3['skills']['backend'][1]);

print_r($a3);

$a4 = range(100, 105);
shuffle($a4);
var_dump($a4);

asort($a4);
var_dump($a4);

arsort($a4);
var_dump($a4);

$a5 = [
    [
        'name' => 'Dmytro Kotenko',
        'age' => 32,
    ],
    [
        'name' => 'Bart Simpson',
        'age' => 11,
    ],
    [
        'name' => 'Homer Simpson',
        'age' => 45,
    ],
    [
        'name' => 'Marge Simpson',
        'age' => 35,
    ],
];
var_dump($a5);

uasort($a5, static function (array $a, array $b) {
    if ($a['age'] === $b['age']) {
        return 0;
    }
    return $a['age'] > $b['age'] ? 1 : -1;

    //return $a['age'] <=> $b['age'];
});
var_dump($a5);