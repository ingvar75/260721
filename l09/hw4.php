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

if (gettype($array) == 'array'){
    echo "Array <br>(<br>";

        $key = array_keys($array);
        foreach ($key as $item){
            if (gettype($array[$item]) == 'array'){
                echo "<br>[$item]";
                echo "=>";
                countArray($array[$item]);
                $counter++;

            }else {
                   echo "[$item]".'=>'.$array[$item]."<br>";$counter++;
                  }
        }

}return;
}
countArray($array);
echo "Counter arrays: $counter";


echo '<hr>';

// HW
// написать рекурсивную функцию для просчета количества элементов в массиве
var_dump(count($array, true));
var_dump(array_keys($array, true));
// написать рекурсивную функцию для вывода массива на экран
echo '<pre>';
print_r($array);
echo '</pre>';
