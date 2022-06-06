<?php

namespace App\Http\Resources\Movie;

use App\Http\Resources\Genre\GenreCollection;
use App\Http\Resources\MovieUser\CastCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'original_name' => $this->original_name,
            'movie_rate'    => $this->movie_rate,
            'grade_count'   => $this->grade_count,
            'detail'        => [
                'description'      => $this->detail->description,
                'production_year'  => $this->detail->production_year,
                'premiere_date_kz' => $this->detail->premiere_date_kz,
                'age_rating'       => $this->detail->age_rating,
                'duration'         => $this->detail->duration,
                'countries'        => [$this->detail->country->countryTranslation->translated_name],
                'producer'         => [
                    'id'        => $this->detail->producer->id,
                    'full_name' => $this->detail->producer->full_name,
                ],
                'casts'            => new CastCollection($this->detail->casts),
                'genres'           => new GenreCollection($this->genres),
            ],

        ];
    }
}