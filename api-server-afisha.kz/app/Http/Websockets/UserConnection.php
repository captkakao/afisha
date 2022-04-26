<?php

namespace App\Http\Websockets;

use Ratchet\ConnectionInterface;
use App\Models\User;

class UserConnection
{
    private ConnectionInterface $connection;
    private ?User $user;
    private array $unpaidSeatNumbers;
    private int $seanceId;


    public function __construct(ConnectionInterface $connection, User $user = null)
    {
        $this->connection = $connection;
        $this->user = $user;
        $this->unpaidSeatNumbers = [];
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

    public function removeUnpaidSeatNumbers(int $rowNumber, int $colNumber): void
    {
        foreach ($this->unpaidSeatNumbers as $idx => $unpaidSeatNumber) {
            if ($unpaidSeatNumber['row_number'] === $rowNumber && $unpaidSeatNumber['col_number'] === $colNumber) {
                unset($this->unpaidSeatNumbers[$idx]);
                break;
            }
        }
    }

    public function addUnpaidSeatNumbers(int $rowNumber, int $colNumber): void
    {
        $this->unpaidSeatNumbers[] = [
            'row_number' => $rowNumber,
            'col_number' => $colNumber,
        ];
    }

    public function getUnpaidSeatNumbers(): array
    {
        return $this->unpaidSeatNumbers;
    }

    public function getSeanceId(): int
    {
        return $this->seanceId;
    }

    public function setSeanceId(int $seanceId): void
    {
        $this->seanceId = $seanceId;
    }
}
