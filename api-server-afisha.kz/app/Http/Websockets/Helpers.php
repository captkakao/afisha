<?php

namespace App\Http\Websockets;

use App\Exceptions\WsResponseException;
use Ratchet\ConnectionInterface;

class Helpers
{
    public function sendErrorMessage(UserConnection $userConnection, string $message, string $errorType)
    {
        $userConnection->getConnection()->send(json_encode([
            'status' => 'error',
            'message' => $message,
            'error_type' => $errorType,
        ], JSON_UNESCAPED_UNICODE));
    }

    public function sendSuccessMessage(UserConnection $userConnection, string $message = 'ok', array $payload = null)
    {
        $userConnection->getConnection()->send(json_encode([
            'status' => 'success',
            'message' => $message,
            'payload' => $payload,
        ], JSON_UNESCAPED_UNICODE));
    }

    public function sendSuccessMessageToOthers(ConnectionInterface $connection, array $seanceVisitors, array $payload)
    {
        foreach ($seanceVisitors as $resourceId => $visitor) {
            if ($resourceId != $connection->resourceId) {
                $this->sendSuccessMessage($visitor, 'hall_updated', $payload);
            }
        }
    }

    /**
     * @throws WsResponseException
     */
    public function checkForSeanceExistence(int $seanceId, array $seances)
    {
        if (!array_key_exists($seanceId, $seances)) {
            throw new WsResponseException('No such seance with id: ' . $seanceId, 'no_such_seance');
        }
    }

    /**
     * @throws WsResponseException
     */
    public function checkIfSeatIsTaken(array $seances, int $seanceId, int $rowIdx, int $colIdx)
    {
        $isTaken = $seances[$seanceId]['hall_config']['seating_area']['rows'][$rowIdx]['seats'][$colIdx]['is_taken'];
        if ($isTaken)
            throw new WsResponseException('Seat with row idx: ' . $rowIdx . ' and col idx: ' . $colIdx . ' is already taken!', 'seat_is_already_taken');
    }

    /**
     * @throws WsResponseException
     */
    public function checkForVisitorExistence(ConnectionInterface $connection, int $seanceId, array $seanceVisitors)
    {
        $isVisitorFound = false;
        foreach ($seanceVisitors as $resourceId => $visitor) {
            if ($resourceId == $connection->resourceId) {
                $isVisitorFound = true;
                break;
            }
        }

        if (!$isVisitorFound) {
            throw new WsResponseException('You did not joined to the seance with id: ' . $seanceId, 'not_joined_to_seance');
        }
    }

    /**
     * @throws WsResponseException
     */
    public function getIndexesOfSeat(int $rowNumber, int $colNumber, array $rowsAndColumns): array
    {
        $rowIndex = $colIndex = null;
        foreach ($rowsAndColumns as $rowIdx => $row) {
            if ($row['row_number'] === $rowNumber) {
                foreach ($row['seats'] as $colIdx => $seat) {
                    if ($seat['col_number'] === $colNumber) {
                        $rowIndex = $rowIdx;
                        $colIndex = $colIdx;
                        break 2;
                    }
                }
            }
        }

        if ($rowIndex === null || $colIndex === null) {
            throw new WsResponseException('Not found seat with row: ' . $rowNumber . ' and col: ' . $colNumber, 'seat_not_found');
        }
        return [$rowIndex, $colIndex];
    }
}
