<?php

namespace App\Http\Resources\Cinema;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CinemaCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($cinema) {
                return [
                    'id' => $cinema->id,
                    'name' => $cinema->name,
                    'address' => $cinema->address,
                ];
            }),
        ];
    }
}
