<?php

namespace App\Http\Resources\MovieUser;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CastCollection extends ResourceCollection
{
    public static $wrap = null;

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($cast) {
            return [
                'id'        => $cast->id,
                'full_name' => $cast->full_name,
            ];
        });
    }
}
