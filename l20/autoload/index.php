<?php

use library\google\Metrics as GoogleMetrics;
use library\yandex\Metrics as YandexMetrics;

require_once __DIR__ . '/../../ClassLoader.php';
spl_autoload_register([new ClassLoader(__DIR__), 'load']);

$google = new GoogleMetrics();
$yandex = new YandexMetrics();
var_dump(
    $google->getData(),
    $yandex->getData()
);