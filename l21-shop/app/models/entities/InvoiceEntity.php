<?php

namespace app\models\entities;

use components\db\ActiveRecord;

/**
 * @property int $id
 * @property string $hash
 * @property float $amount
 * @property int $user_id
 * @property string $status
 * @property string $created_at
 */
class InvoiceEntity extends ActiveRecord
{
    public const STATUS_NEW = 'new';
    public const STATUS_IN_PROGRESS = 'in_progress';
    public const STATUS_PAID = 'paid';
    public const STATUS_PENDING = 'pending';
    public const STATUS_DECLINED = 'declined';

    public function tableName(): string
    {
        return 'invoices';
    }
}