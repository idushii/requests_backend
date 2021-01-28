<?php

namespace App;

use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;

class MyCustomWebSocketHandler implements MessageComponentInterface
{

    public function onOpen(ConnectionInterface $connection)
    {
        error_log('onOpen');
        $connection->send('Hello');

        $socketId = sprintf('%d.%d', random_int(1, 1000000000), random_int(1, 1000000000));
        $connection->socketId = $socketId;

        $connection->app = new \stdClass();
        $connection->app->id = 'my_app';
    }

    public function onClose(ConnectionInterface $connection)
    {
        error_log('onClose');
    }

    public function onError(ConnectionInterface $connection, \Exception $e)
    {
        error_log('onError');
        $connection->send(json_encode(['onError' => true]));
    }

    public function onMessage(ConnectionInterface $connection, MessageInterface $msg)
    {
        error_log('onMessage');
        $connection->send($msg);
    }
}
