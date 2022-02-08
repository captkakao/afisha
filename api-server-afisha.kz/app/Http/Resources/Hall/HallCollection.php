<?php

namespace App\Http\Resources\Hall;

use Illuminate\Http\Resources\Json\ResourceCollection;

class HallCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($hall) {
                return [
                    'id' => $hall->id,
                    'name' => $hall->name,
                    'seat_config_example' => $hall->seat_config_example,
                ];
            }),
        ];
    }
}
