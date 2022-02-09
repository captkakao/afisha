<?php

namespace App\Http\Resources\Event;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EventCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($event) {
                return [
                    'id' => $event->id,
                    'title' => $event->title,
                    'cinema_id' => $event->cinema_id,
                    'created_at' => $event->created_at,
                ];
            }),
        ];
    }
}
