<?php

namespace App\Http\Resources\Event;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EventImageCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->transform(function ($image) {
            return [
                'image_path' => $image->image_path,
            ];
        });
    }
}
