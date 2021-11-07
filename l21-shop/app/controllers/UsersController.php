<?php

namespace app\controllers;

use components\AbstractController;

class UsersController extends AbstractController
{
    protected bool $isSecured = true;

    public function actionLogout(): void
    {
        $this->session()->destroy();
        $this->response()->goToAuth();
    }
}
