<?php
$counter = 0;
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
$k = 0;
$tab = 1;
$tabs = "    ";
echo "<pre>";
echo 'Array'.PHP_EOL,"(".PHP_EOL;
countArray($array, $tab);
function countArray($array, int $tab)
{
    global $counter;
    global $tabs;
    global $k;
        foreach ($array as $key => $item){

           if (is_array($array[$key]) == true) {
                $k++;
                echo str_repeat($tabs, $tab). "[$key] " . "=>" . " Array". PHP_EOL;
                echo str_repeat($tabs, $tab+1)."(".PHP_EOL;
                countArray($array[$key], $tab+1);
                $counter++;
                echo str_repeat($tabs, $tab+1).")".PHP_EOL;

            }else {
               if ($k==0) {
                   echo str_repeat($tabs, $tab), "[$key] ".'=> '.$array[$key].PHP_EOL;$counter++;
               }
                      else {
                          echo str_repeat($tabs, $tab + 1), "[$key] " . '=> ' . $array[$key] . PHP_EOL;
                          $counter++;
                      }
                  }
        }
return;
}

echo ")";
echo "</pre>";

echo "<br>Counter: ".$counter;

echo '<hr>';

// HW
// написать рекурсивную функцию для просчета количества элементов в массиве
var_dump(count($array, true));
var_dump(array_keys($array, true));
// написать рекурсивную функцию для вывода массива на экран
echo '<pre>';
print_r($array);
echo '</pre>';
