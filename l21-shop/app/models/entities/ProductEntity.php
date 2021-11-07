<?php

namespace app\models\entities;

use components\db\ActiveQuery;

/**
 * @property int $id
 * @property string $title
 * @property float $price
 * @property int $quantity
 * @property string $description
 * @property string $created_at
 */
class ProductEntity extends ActiveQuery
{
    public function tableName(): string
    {
        return 'products';
    }
}