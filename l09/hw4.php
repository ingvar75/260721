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

$tab = 0;
function countArray($array, int $tab)
{
    global $counter;
    $tabs = "&nbsp";
if (gettype($array) == 'array'){
    echo $tabs,'Array','<br>';
    $tabs = str_repeat($tabs, $tab+4);
    echo $tabs,"(<br>";

        $key = array_keys($array);
        foreach ($key as $item){
            if (gettype($array[$item]) == 'array'){
                echo $tabs,"[$item]","=>";
                countArray($array[$item], $tab+4);
                $counter++;

            }else {
                   echo $tabs, "[$item]".'=>'.$array[$item]."<br>";$counter++;

                  }
        }
    echo "$tabs)<br>";
}return;
}
countArray($array, $tab);
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
