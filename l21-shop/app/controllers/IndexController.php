<?php

namespace app\controllers;

use components\AbstractController;

class IndexController extends AbstractController
{
    public function actionIndex(): string
    {
        return $this->render('index/index');
    }
}