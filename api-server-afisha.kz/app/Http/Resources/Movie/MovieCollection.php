<?php

namespace App\Http\Resources\Movie;

use App\Http\Resources\Genre\GenreCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\URL;

class MovieCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($movie) {
                return [
                    'id'         => $movie->id,
                    'name'       => $movie->name,
                    'movie_rate' => $movie->movie_rate ? round($movie->movie_rate, 1) : null,
                    'genres'     => new GenreCollection($movie->genres),
                    'logo_image' => URL::to('storage/' . $movie->images[0]->image_path),
                ];
            }),
        ];
    }
}
