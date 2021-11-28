<?php

namespace app\controllers;

use components\AbstractController;

class CabinetController extends AbstractController
{
    public function actionIndex(): string
    {
        return $this->render('cabinet/index');
    }
}