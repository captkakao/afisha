<?php

namespace App\Http\Resources\Available;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CityCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($city) {
                return [
                    'id' => $city->id,
                    'name' => $city->cityTranslation->translated_name,
                ];
            }),
        ];
    }
}
