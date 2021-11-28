<?php

session_start();

//$_SESSION['test'] = 123;
$_SESSION['qwerty'] = 'My name is Slim Shady';
$_SESSION['browser'] = 'Chrome';

var_dump($_SESSION['test']);