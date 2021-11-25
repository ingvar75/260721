<?php

namespace app\controllers;

use components\AbstractController;

class UsersController extends AbstractController
{
    public function actionLogout(): void
    {
        $this->session()->destroy();
        $this->response()->goToAuth();
    }
}
