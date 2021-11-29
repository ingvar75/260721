<?php

namespace App\Console\Components;

use App\Models\Message;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class WebSocketComponent implements MessageComponentInterface
{
    private array $connections = [];

    function onOpen(ConnectionInterface $conn)
    {
        $this->connections[$conn->resourceId] = $conn;
    }

    function onClose(ConnectionInterface $conn)
    {
        unset($this->connections[$conn->resourceId]);
    }

    function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred with connection {$conn->resourceId}: {$e->getMessage()}\n";
        unset($this->connections[$conn->resourceId]);
        $conn->close();
    }

    function onMessage(ConnectionInterface $from, $msg)
    {
        $message = json_decode($msg, true);
        $data = $message['data'];

        $message = new Message();
        $message->user_id = $data['userId'];
        $message->room_id = $data['roomId'];
        $message->text = $data['text'];
        $message->created_at = date('Y-m-d H:i:s', $data['time']);
        $message->save();
    }
}
