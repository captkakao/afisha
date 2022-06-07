<?php

namespace App\Repositories;

use App\Models\Hall;

class HallRepository
{
    public static function paginateSeancesForToday(int $cinemaId, string $datetime, string $date, int $perPage = 10)
    {
        return Hall::where('cinema_id', $cinemaId)
            ->join('seances', function ($join) use ($datetime, $date) {
                $join->on('halls.id', '=', 'seances.hall_id')
                    ->where('seances.show_time', '>', $datetime)
                    ->whereDate('seances.show_time', '=', $date);
            })
            ->join('movies', 'movies.id', 'seances.movie_id')
            ->select('seances.id as seance_id', 'seances.show_time', 'halls.name as hall_name', 'seances.price_adult', 'seances.price_kid', 'seances.price_student', 'seances.price_vip', 'movies.id as movie_id', 'movies.name as movie_name')
            ->orderBy('halls.id')
            ->paginate($perPage);
    }

    public static function create(string $name, string $seatConfig, int $cinemaId)
    {
        return Hall::create([
            'name' => $name,
            'seat_config_example' => $seatConfig,
            'cinema_id' => $cinemaId,
        ]);
    }

    public static function update(string $name, string $seatConfig, Hall $hall): bool
    {
        return $hall->update([
            'name' => $name,
            'seat_config_example' => $seatConfig,
        ]);
    }
}
