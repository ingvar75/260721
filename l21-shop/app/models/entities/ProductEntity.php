<?php

namespace app\models\entities;

use components\db\ActiveRecord;

/**
 * @property int $id
 * @property string $title
 * @property float $price
 * @property int $quantity
 * @property string $description
 * @property string $created_at
 */
class ProductEntity extends ActiveRecord
{
    public function tableName(): string
    {
        return 'products';
    }
}