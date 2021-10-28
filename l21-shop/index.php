<?php

require_once __DIR__ . '/../ClassLoader.php';
spl_autoload_register([(new ClassLoader(__DIR__)), 'load']);

$config = require __DIR__ . '/configs/global.php';
$app = App::init($config);