<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LanguageSeeder::class,
            CountrySeeder::class,
            CitySeeder::class,
            GenreSeeder::class,
            UserSeeder::class,
            CinemaSeeder::class,
            MovieUserSeeder::class,
            MovieSeeder::class,
            MovieDetailSeeder::class,
            MovieGradeSeeder::class,
            HallSeeder::class,
            SeanceSeeder::class,
            NewsSeeder::class,
        ]);

    }
}
