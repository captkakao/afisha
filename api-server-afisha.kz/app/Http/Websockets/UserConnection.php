<?php

namespace App\Http\Websockets;

use Ratchet\ConnectionInterface;
use App\Models\User;

class UserConnection
{
    private ConnectionInterface $connection;
    private ?User $user;
    private array $unpaidSeatIds;


    public function __construct(ConnectionInterface $connection, User $user = null)
    {
        $this->connection = $connection;
        $this->user = $user;
        $this->unpaidSeatIds = [];
    }

    public function getConnection(): ConnectionInterface
    {
        return $this->connection;
    }

    public function setConnection(ConnectionInterface $connection): void
    {
        $this->connection = $connection;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): void
    {
        $this->user = $user;
    }
}
