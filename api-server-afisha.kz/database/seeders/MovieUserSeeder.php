<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\MovieUser;
use Illuminate\Database\Seeder;

class MovieUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'full_name' => 'Эндрю Гарфилд',
                'full_original_name' => 'Andrew Garfield',
                'born_date' => '1983-08-20',
                'born_country_id' => 147,
                'height' => '179',
            ],
            [
                'id' => 2,
                'full_name' => 'Марк Уэбб',
                'full_original_name' => 'Marc Webb',
                'born_date' => '1974-08-31',
                'born_country_id' => 147,
                'height' => '175',
            ],
            [
                'id' => 3,
                'full_name' => 'Эмма Стоун',
                'full_original_name' => 'Emma Stone',
                'born_date' => '1988-11-06',
                'born_country_id' => 147,
                'height' => '168',
            ],
            [
                'id' => 4,
                'full_name' => 'Мэтт Ривз',
                'full_original_name' => 'Matt Reeves',
                'born_date' => '1966-04-27',
                'born_country_id' => 147,
                'height' => '177',
            ],
            [
                'id' => 5,
                'full_name' => 'Роберт Паттинсон',
                'full_original_name' => 'Robert Pattinson',
                'born_date' => '1986-05-13',
                'born_country_id' => 146,
                'height' => '185',
            ],
            [
                'id' => 6,
                'full_name' => 'Мэл Гибсон',
                'full_original_name' => 'Mel Gibson',
                'born_date' => '1956-01-03',
                'born_country_id' => 147,
                'height' => '177',
            ],
            [
                'id' => 7,
                'full_name' => 'Фрэнсис Форд Коппола',
                'full_original_name' => 'Francis Ford Coppola',
                'born_date' => '1939-04-07',
                'born_country_id' => 147,
                'height' => '182',
            ],
            [
                'id' => 8,
                'full_name' => 'Аль Пачино',
                'full_original_name' => 'Al Pacino',
                'born_date' => '1940-04-25',
                'born_country_id' => 147,
                'height' => '170',
            ],
            [
                'id' => 9,
                'full_name' => 'Алексей Балабанов',
                'full_original_name' => 'Алексей Балабанов',
                'born_date' => '1959-02-25',
                'born_country_id' => 120,
                'height' => '175',
            ],
            [
                'id' => 10,
                'full_name' => 'Сергей Бодров мл.',
                'full_original_name' => 'Сергей Бодров мл.',
                'born_date' => '1971-12-27',
                'born_country_id' => 120,
                'height' => '183',
            ],
            [
                'id' => 11,
                'full_name' => 'Кристофер Нолан',
                'full_original_name' => 'Christopher Nolan',
                'born_date' => '1970-07-30',
                'born_country_id' => 146,
                'height' => '181',
            ],
            [
                'id' => 12,
                'full_name' => 'Кристиан Бэйл',
                'full_original_name' => 'Christian Bale',
                'born_date' => '1974-01-30',
                'born_country_id' => 146,
                'height' => '183',
            ],
        ];
        MovieUser::insert($users);
    }
}
