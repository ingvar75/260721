<?php

use vendor\LiqPay;

return [
    'controllersNamespace' => 'app\controllers',
    'defaultController' => 'index',
    'defaultAction' => 'index',
    'authPage' => '/guest/login',
    'components' => [
        'db' => [
            'driver' => 'mysql',
            'host' => 'db',
            'user' => 'skillup_user',
            'password' => 'skillup_pwd',
            'dbName' => 'skillup_db',
        ],
        'template' => [
            'templatesDir' => __DIR__ . '/../app/views/templates',
            'layoutsDir' => __DIR__ . '/../app/views/layouts',
            'defaultLayout' => 'main',
            'extension' => 'php',
            'notFoundTemplate' => '404',
        ],
        'liqPay' => [
            'publicKey' => 'sandbox_i53140891404',
            'privateKey' => 'sandbox_0rZu7z3P1ucmC7mukdRYe05yBe0hOwaoXywUyv9o',
            'currency' => LiqPay::CURRENCY_USD
        ],
    ],
];