<?php

namespace app\models;

use components\ComponentsTrait;

class User extends entities\UserEntity
{
    use ComponentsTrait;

    public function login(string $password): bool
    {
        $isPasswordCorrect = password_verify($password, $this->password);
        if ($isPasswordCorrect) {
            $this->user()->login($this);
            return true;
        }

        return false;
    }
}