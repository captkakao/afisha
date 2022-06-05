<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\GenreTranslation;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = json_decode(file_get_contents(dirname(__DIR__) . '/data/genre/genres.json'), true);
        Genre::insert($genres);

        $translatedGenresEnglish = json_decode(file_get_contents(dirname(__DIR__) . '/data/genre/translated_genres_en.json'), true);
        $translatedGenresRussian = json_decode(file_get_contents(dirname(__DIR__) . '/data/genre/translated_genres_ru.json'), true);
        $translatedGenresKazakh = json_decode(file_get_contents(dirname(__DIR__) . '/data/genre/translated_genres_kz.json'), true);

        GenreTranslation::insert($translatedGenresEnglish);
        GenreTranslation::insert($translatedGenresRussian);
        GenreTranslation::insert($translatedGenresKazakh);
    }
}
