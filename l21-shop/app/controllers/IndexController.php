<?php

namespace app\controllers;

use components\AbstractController;

class IndexController extends AbstractController
{
    public function actionIndex()
    {
        echo $this->render('index/index');
    }
}