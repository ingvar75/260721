<?php

namespace App\Console\Components;

use App\Models\Message;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class WebSocketComponent implements MessageComponentInterface
{
    private const TYPE_MESSAGE = 'message';
    private const TYPE_SUBSCRIBE = 'subscribe';

    /**
     * @var ConnectionInterface[]
     */
    private array $connections = [];
    private array $subscriptions = [];

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
        $payload = json_decode($msg, true);
        switch ($payload['type']) {
            case self::TYPE_MESSAGE:
                $this->processMessage($payload);
                break;
            case self::TYPE_SUBSCRIBE:
                $this->processSubscription($payload, $from);
                break;
        }
    }

    private function processMessage(array $payload): void
    {
        $data = $payload['data'];

        $message = new Message();
        $message->user_id = $data['userId'];
        $message->room_id = $data['roomId'];
        $message->text = $data['text'];
        $message->created_at = date('Y-m-d H:i:s', $data['time']);
        $message->save();

        foreach ($this->subscriptions[$message->room_id] as $connectionId) {
            $connection = $this->connections[$connectionId] ?? null;
            if ($connection === null) {
                continue;
            }

            $connection->send($message);
        }
    }

    private function processSubscription(array $payload, ConnectionInterface $conn): void
    {
        $data = $payload['data'];

        $roomId = $data['roomId'];
        $this->subscribe($roomId, $conn->resourceId);
    }

    private function subscribe(int $roomId, int $connectionId): void
    {
        $this->clearSubscriptions($connectionId);
        $this->subscriptions[$roomId][] = $connectionId;
    }

    private function clearSubscriptions(int $connectionId): void
    {
        foreach ($this->subscriptions as &$connections) {
            $index = array_search($connectionId, $connections);
            if ($index !== false) {
                unset($connections[$index]);
            }
        }
    }
}
