<?php

namespace App\Http\Resources\Image;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\URL;

class ImageCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($image) {
                return [
                    'id' => $image->id,
                    'image_path' => URL::to('storage/' . $image->image_path),
                ];
            }),
        ];
    }
}
