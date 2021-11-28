<?php

$int = 1;
var_dump($int, PHP_INT_MIN, PHP_INT_MAX);

$float = 3.2;
var_dump($float);

$problem = (0.1 + 0.7) * 10;
var_dump($problem, (int)$problem);

$string = 'Test string';
var_dump($string, $string[0], $string[2]);

$bool = true;
$bool2 = false;
$testString = 'r';
var_dump($bool, $bool2, 5 > 6, 5 < 10, empty($testString));

$null = null;
var_dump($null);

//$array = array('test', 123);
$array = ['test', 123, 5.4];
var_dump($array, $array[1]);

$object = new stdClass();
$object->test = 123;
var_dump($object, $object->test);

$resource = fopen(__DIR__ . '/constants.php', 'rb');
var_dump($resource);
while ($line = fgets($resource, 4096)) {
    echo nl2br(htmlspecialchars($line));
}
fclose($resource);

$callable = static function () {
    var_dump('INSIDE FUNCTION');
};
var_dump($callable);
$callable();

$iterable = static function () {
    yield 1;
    yield 3;
    yield 6;
    yield 100;
};
var_dump($iterable);
foreach ($iterable() as $item) {
    var_dump($item);
}