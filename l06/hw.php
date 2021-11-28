<?php

$x =1||2||3 ;
if ($x == 1) {
    echo 1;
}
if ($x == 2) {
    echo 2;
}
if ($x == 3) {
    echo 3;
}
// 123

/*
 * Калькулятоп
 * создать форму с 3 полями и кнопкой отправки
 * 1 поле принимает число
 * 2 поле принимпет математический оператор (+,-,/,*)
 *
 * пример:
 * [ 1 ] [ + ] [ 3 ] [ Calculate ]
 * Ркзультат: 1 + 3 = 4
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
</head>
<body>
<h1>Calculator</h1>

<?php
if (!isset($_POST['action'])) $_POST['action'] = null;
switch ($_POST['action']){
    case "+":
         if ($_POST['nomber1'] != '' && $_POST['nomber2'] != ''){
           echo $_POST['nomber1'],$_POST['action'],$_POST['nomber2']. "=". $_POST['nomber1']+$_POST['nomber2']."<br>";
         }else{
             echo "No data in form! Please enter data";
         }
           break;
    case "-":
         if ($_POST['nomber1'] != '' && $_POST['nomber2'] != ''){
           echo $_POST['nomber1'],$_POST['action'],$_POST['nomber2']. "=". $_POST['nomber1']-$_POST['nomber2']."<br>";
         }else{
             echo "No data in form! Please enter data";
         }
           break;
    case "/":
         if ($_POST['nomber1'] != '' && $_POST['nomber2'] != ''){
           if ($_POST['nomber2'] == 0) echo 'Ошибка, делить на ноль нельзя!'; break;
           echo $_POST['number1'], $_POST['action'], $_POST['nomber2']. "=". $_POST['nomber1']/$_POST['nomber2']."<br>";
         }else{
             echo "No data in form! Please enter data";
         }
           break;
    case "*":
         if ($_POST['nomber1'] != '' && $_POST['nomber2'] != ''){
           echo $_POST['nomber1'],$_POST['action'],$_POST['nomber2']. "=". $_POST['nomber1']*$_POST['nomber2']."<br>";
         }else{
             echo "No data in form! Please enter data";
         }
           break;

  }
?>
<form method="post">
    <label for="number-input">Enter number1, "+","-","/","*" and nomber2</label><br>
    <label>
        <input type="number" name="nomber1">
    </label>
    <label>
        <input type="text" name="action">
    </label>
    <label>
        <input type="number" name="nomber2">
    </label>

    <button type="submit">GO</button>
</form>
</body>
</html>