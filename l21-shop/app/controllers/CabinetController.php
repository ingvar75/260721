<?php

namespace app\controllers;

use components\AbstractController;

class CabinetController extends AbstractController
{
    protected bool $isSecured = true;

    public function actionIndex(): string
    {
        return $this->render('cabinet/index');
    }
}