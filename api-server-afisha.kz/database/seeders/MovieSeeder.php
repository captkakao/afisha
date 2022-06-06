<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = [
            [
                'id' => 1,
                'name' => 'Новый Человек-паук',
                'original_name' => 'The Amazing Spider Man',
                'is_active' => true,
            ],
            [
                'id' => 2,
                'name' => 'Бэтмен',
                'original_name' => 'The Batman',
                'is_active' => true,
            ],
            [
                'id' => 3,
                'name' => 'По соображениям совести',
                'original_name' => 'Hacksaw Ridge',
                'is_active' => true,
            ],
            [
                'id' => 4,
                'name' => 'Бэтмен: Начало',
                'original_name' => 'Batman Begins',
                'is_active' => true,
            ],
            [
                'id' => 5,
                'name' => 'Крестный отец',
                'original_name' => 'The Godfather',
                'is_active' => true,
            ],
            [
                'id' => 6,
                'name' => 'Брат',
                'original_name' => 'Брат',
                'is_active' => true,
            ],
            [
                'id' => 7,
                'name' => 'Три кота и море приключений',
                'original_name' => 'Три кота и море приключений',
                'is_active' => true,
            ],
            [
                'id' => 8,
                'name' => 'Венецияфрения',
                'original_name' => 'Veneciafrenia',
                'is_active' => true,
            ],
            [
                'id' => 9,
                'name' => 'Я краснею',
                'original_name' => 'Turning Red',
                'is_active' => true,
            ],
        ];
        Movie::insert($movies);


    }
}
