<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $avatar
 * @property string $created_at
 * @property string $updated_at
 */
class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable = [
        'title',
        'avatar',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
