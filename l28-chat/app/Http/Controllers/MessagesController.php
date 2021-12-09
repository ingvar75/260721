<?php

namespace App\Http\Controllers;

use App\Models\Message;

class MessagesController extends Controller
{
    public function getMessages(int $roomId): array
    {
        return Message::query()->where('room_id', $roomId)->get()->all();
    }
}
