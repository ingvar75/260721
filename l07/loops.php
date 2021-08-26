<?php

for($i = 0; $i <= 5; $i++) {
    echo $i, '<br>';
}

/*
 * 1 x 1 = 1
 * 1 x 2 = 2
 * ...
 * ...
 * 9 x 9 = 81
 * 9 x 10 = 90
 */

for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 === 0) {
        echo $i, '<br>';
    }
}

echo '<hr>';

$array = [3, 44, 555, 6543, 21, 'test'];
var_dump($array);
$count = count($array);
for ($i = 0; $i < $count; $i++) {
    echo "{$i}: {$array[$i]}<br>";
}

echo '<hr>';

for ($number = 2; $number < 30; $number++) {
    $dividers = 0;
    for ($divider = 2; $divider <= $number; $divider++) {
        if ($number % $divider === 0) {
            $dividers++;
        }
    }

    if ($dividers === 1) {
        echo $number, '<br>';
    }
}

$resource = fopen(__DIR__ . '/superglobal.php', 'rb');
while ($line = fgets($resource, 4096)) {
    echo nl2br(htmlspecialchars($line));
}
fclose($resource);

//while (true) {
//    echo date('H:i:s'), PHP_EOL;
//    sleep(1);
//}

echo '<hr>';

$a = [1, 2, 4, 5, 6, 10];
do {
    $number = random_int(1, 10);
    echo $number, '<br>';
} while (in_array($number, $a));

echo '<hr>';

foreach ($a as $key => $value) {
    echo "{$key}: {$value}<br>";
}

echo '<hr>';

$a2 = [
    'name' => 'Dmytro',
    'age' => 32,
    'job' => 'PHP Dev',
];
foreach ($a2 as $key => $item) {
    echo "{$key}: {$item}<br>";
}

//die('TADA');
//exit('TADA!!!');

echo '<hr>';

$a3 = [1, 2, 3 ,4];
foreach ($a3 as &$number) {
    $number *= 2;
}
unset($number);
$number = 123;
var_dump($a3);

echo '<hr>';

for ($i = 10; $i > 0; $i--) {
    if (in_array($i, [3, 5, 6])) {
        continue;
    }

    if ($i === 4) {
        break;
    }

    var_dump($i);
}