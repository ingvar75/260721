<?php

namespace app\controllers;

use app\models\User;
use components\AbstractController;

class GuestController extends AbstractController
{
    protected bool $isSecured = false;

    public function actionLogin(): string
    {
        if ($this->request()->isPost()) {
            $user = User::findOne(['login' => $this->request()->post()->get('login')]);
            if ($user && $user->login($this->request()->post()->get('password'))) {
                $this->response()->redirect('/');
            }

            $this->session()->addFlash(
                'loginErrors', ['login' => 'Login or password is incorrect']
            );
        }
        return $this->render('guest/login');
    }
}