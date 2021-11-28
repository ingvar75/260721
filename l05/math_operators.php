<?php

$four = 4;
$five = 5;

echo 'Multiply';
$multiply = $five * $four;
$multiplyNumber = 3;
//$multiplyNumber = $multiplyNumber * 2;
$multiplyNumber *= 2;
var_dump($multiply, $multiplyNumber);
echo '<br>';

echo 'Sum';
$sum = $five + $four;
$sumNumber = 5;
//$sumNumber = $sumNumber + 6;
$sumNumber += 6;
var_dump($sum, $sumNumber);
echo '<br>';

echo 'Divide';
$divide = $five / $four;
$divideNumber = 7;
//$divideNumber = $divideNumber / 3;
$divideNumber /= 3;
var_dump($divide, $divideNumber);

$res = 1 / 3;
$round = round($res, 3);
$floor = floor($res);
$ceil = ceil($res);
var_dump($res, $round, $floor, $ceil);
echo '<br>';

echo 'Minus';
$minus = $four - $five;
var_dump($minus);
echo '<br>';

echo 'Power';
$power = $five ** $four;
var_dump($power);
echo '<br>';

echo 'Grouping';
$grouping = (2 + 2) * 2;
var_dump($grouping);
echo '<br>';

echo 'Increments';
$incNumber = 5;
//$incNumber = $incNumber + 1;
//$incNumber += 1;
$incNumber++;
$incNumber++;
$incNumber--;
++$incNumber;
--$incNumber;

var_dump($incNumber);

$test = 6;
$test = $test++ + $test++; // 13
$test = $test++ + ++$test; // 14
$test = ++$test + ++$test; // 15
var_dump($test);