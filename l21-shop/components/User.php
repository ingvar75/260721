<?php

namespace components;

use app\models\User as UserModel;

class User
{
    use ComponentsTrait;

    private const USER_SESSION_KEY = 'userData';

    public function isGuest(): bool
    {
        return $this->getModel() === null;
    }

    public function login(UserModel $user): void
    {
        $this->session()->set(self::USER_SESSION_KEY, $user);
    }

    public function getModel(): ?UserModel
    {
        return $this->session()->get(self::USER_SESSION_KEY);
    }
}