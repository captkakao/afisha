<?php

namespace App\Repositories\Available;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityRepository
{
    public static function getWithCityTranslationByLanguageId(int $languageId): Collection|array
    {
        return City
            ::with(['cityTranslation' => function ($query) use ($languageId) {
                $query->select('translated_name', 'city_id')
                    ->where('language_id', $languageId);
            }])
            ->select('id')
            ->get();
    }
}
