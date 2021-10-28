<?php

require_once __DIR__ . '/../../ClassLoader.php';
spl_autoload_register([new ClassLoader(__DIR__), 'load']);

$product = new \models\Product();
$product->sale();

$discount = new \models\Discount();
$discount->useDiscount();