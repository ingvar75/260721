<?php

namespace app\models\entities;

use components\db\ActiveRecord;

/**
 * @property int $id
 * @property string $name
 * @property string $login
 * @property string $password
 * @property string $birthday
 * @property string $last_login_date
 * @property string $created_at
 */
class UserEntity extends ActiveRecord
{
    public function tableName(): string
    {
        return 'users';
    }
}