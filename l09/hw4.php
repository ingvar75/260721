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


function countArray($array)
{
    global $counter;

        $counter++;
        $key = array_keys($array);
        //var_dump($array);
        foreach ($key as $item){
            if (gettype($array[$item]) != 'array'){
                echo $item.'=>'.$array[$item]."<br>";
            }else {
                echo $item . '=>' . countArray($array[$item]) . "<br>";
                  }
        }
    return;
}
echo countArray($array), $counter;

echo '<hr>';

// HW
// написать рекурсивную функцию для просчета количества элементов в массиве
var_dump(count($array, true));
var_dump(array_keys($array, true));
// написать рекурсивную функцию для вывода массива на экран
echo '<pre>';
print_r($array);
echo '</pre>';
