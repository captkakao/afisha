<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\CityTranslation;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = json_decode(file_get_contents(dirname(__DIR__) . '/data/city/cities.json'), true);
        City::insert($cities);

        $translatedCitiesEnglish = json_decode(file_get_contents(dirname(__DIR__) . '/data/city/translated_cities_en.json'), true);
        $translatedCitiesRussian = json_decode(file_get_contents(dirname(__DIR__) . '/data/city/translated_cities_ru.json'), true);
        $translatedCitiesKazakh = json_decode(file_get_contents(dirname(__DIR__) . '/data/city/translated_cities_kz.json'), true);

        CityTranslation::insert($translatedCitiesEnglish);
        CityTranslation::insert($translatedCitiesRussian);
        CityTranslation::insert($translatedCitiesKazakh);
    }
}
