<?php

namespace App\Repositories\Cinema;

use App\Models\Cinema;

class CinemaRepository
{
    public static function getByCityId(int $cityId)
    {
        return Cinema::where('city_id', $cityId)
            ->select('id', 'name', 'address')
            ->get();
    }

    public static function create(string $name, string $description, string $phone, string $address, int $cityId, int $userId)
    {
        return Cinema::create([
            'name' => $name,
            'description' => $description,
            'phone' => $phone,
            'address' => $address,
            'city_id' => $cityId,
            'user_id' => $userId,
        ]);
    }

    public static function update(int $cinemaId, string $name, string $description, string $phone, string $address, int $cityId, int $userId)
    {
        return Cinema::where('id', $cinemaId)
            ->update([
                'name' => $name,
                'description' => $description,
                'phone' => $phone,
                'address' => $address,
                'city_id' => $cityId,
                'user_id' => $userId,
            ]);
    }
}
