<?php

namespace app\models\entities;

use components\db\ActiveQuery;

/**
 * @property int $id
 * @property string $name
 * @property string $login
 * @property string $password
 * @property string $birthday
 * @property string $last_login_date
 * @property string $created_at
 */
class User extends ActiveQuery
{
    public function tableName(): string
    {
        return 'users';
    }
}