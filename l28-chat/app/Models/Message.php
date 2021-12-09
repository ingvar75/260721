<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $room_id
 * @property int $user_id
 * @property string $text
 * @property string $created_at
 * @property string $updated_at
 */
class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'room_id',
        'user_id',
        'text',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
