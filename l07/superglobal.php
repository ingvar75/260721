<?php

setcookie('skillup_test', 'OK');

$money = 123;

var_dump($_POST, $_GET, $_COOKIE, $_FILES, $_REQUEST);
var_dump($_SERVER, $_ENV, $GLOBALS);

var_dump(
    $GLOBALS['_REQUEST']['name'],
    $_REQUEST['name']
);
$GLOBALS['money'] = 12;
$money = 1000;

var_dump($money);

?>
<form method="post"
      action="/l07/superglobal.php?name=Dmytro&age=32"
      enctype="multipart/form-data">

    <input type="text" name="test" value="123">
    <input type="file" name="attach">
    <input type="submit" value="TEST">

</form>