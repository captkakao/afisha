<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\CountryTranslation;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = json_decode(file_get_contents(dirname(__DIR__) . '/data/country/countries.json'), true);
        Country::insert($countries);

        $translatedCountriesEnglish = json_decode(file_get_contents(dirname(__DIR__) . '/data/country/translated_countries_en.json'), true);
        $translatedCountriesRussian = json_decode(file_get_contents(dirname(__DIR__) . '/data/country/translated_countries_ru.json'), true);
        $translatedCountriesKazakh = json_decode(file_get_contents(dirname(__DIR__) . '/data/country/translated_countries_kz.json'), true);

        CountryTranslation::insert($translatedCountriesEnglish);
        CountryTranslation::insert($translatedCountriesRussian);
        CountryTranslation::insert($translatedCountriesKazakh);
    }
}
