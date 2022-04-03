<?php

namespace Database\Seeders;

use App\Models\Cinema;
use App\Models\Hall;
use App\Models\Movie;
use App\Models\Seance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cinemaData = [
            [
                'name' => 'Adam Joy`s cinema #1',
                'description' => 'Some description',
                'address' => 'Some fake address #1',
                'phone' => '77473456789',
                'city_id' => 3, // Almaty
                'user_id' => 2, // Adam Joy
            ],
            [
                'name' => 'Adam Joy`s cinema #1',
                'description' => 'Some description',
                'address' => 'Some fake address #2',
                'phone' => '77071234567',
                'city_id' => 3, // Almaty
                'user_id' => 2, // Adam Joy
            ],
        ];
        Cinema::insert($cinemaData);

        $movies = [
            [
                'id' => 1,
                'name' => 'Новый человек паук',
                'original_name' => 'The Amazing Spider Man',
                'premiere_date' => '2020-01-23',
                'duration' => 134,
                'director' => 'Mark Web',
                'cast' => 'Andrew Garfield',
            ],
            [
                'id' => 2,
                'name' => 'Новый человек паук 2',
                'original_name' => 'The Amazing Spider Man 2',
                'premiere_date' => '2022-01-23',
                'duration' => 145,
                'director' => 'Mark Web',
                'cast' => 'Andrew Garfield',
            ],
            [
                'id' => 3,
                'name' => 'По соображениям совести',
                'original_name' => 'Hacksaw Ridge',
                'premiere_date' => '2022-01-23',
                'duration' => 139,
                'director' => 'Mel Gibson',
                'cast' => 'Andrew Garfield',
            ],
        ];
        Movie::insert($movies);

        $halls = [
            [
                'id' => 1,
                'name' => 'Зал 1',
                'cinema_id' => 1,
                'hall_config_example' => json_encode([
                    'x' => "800px",
                    'y' => "400px",
                    'screen' => [
                        'x' => '500px',
                        'y' => null,
                        'curve_degree' => '5px',
                        'm-top' => null,
                        'm-right' => '150px',
                        'm-bottom' => null,
                        'm-left' => '150px',
                    ],
                    'seating_area' => [
                        'x' => '900px',
                        'y' => '460px',
                        'm-top' => null,
                        'm-right' => null,
                        'm-bottom' => null,
                        'm-left' => null,
                        'rows' => [
                            [
                                'row_number' => 1,
                                'seats' => [
                                    [
                                        'x' => '5px',
                                        'y' => '5px',
                                        'col_number' => 1,
                                        'is_taken' => true,
                                        'm_top' => null,
                                        'm_right' => null,
                                        'm_bottom' => null,
                                        'm_left' => '10px',
                                    ],
                                    [
                                        'x' => '5px',
                                        'y' => '5px',
                                        'col_number' => 2,
                                        'is_taken' => true,
                                        'm_top' => null,
                                        'm_right' => null,
                                        'm_bottom' => null,
                                        'm_left' => null,
                                    ],
                                ],
                            ]
                        ],
                    ],
                ], true),
            ],
            [
                'id' => 2,
                'name' => 'Зал 2',
                'cinema_id' => 1,
                'hall_config_example' => json_encode([
                    'x' => "800px",
                    'y' => "400px",
                    'screen' => [
                        'x' => '500px',
                        'y' => null,
                        'curve_degree' => '5px',
                        'm-top' => null,
                        'm-right' => '150px',
                        'm-bottom' => null,
                        'm-left' => '150px',
                    ],
                    'seating_area' => [
                        'x' => '800px',
                        'y' => '360px',
                        'm-top' => null,
                        'm-right' => null,
                        'm-bottom' => null,
                        'm-left' => null,
                        'rows' => [
                            [
                                'row_number' => 1,
                                'seats' => [
                                    [
                                        'x' => '5px',
                                        'y' => '5px',
                                        'col_number' => 1,
                                        'is_taken' => true,
                                        'm_top' => null,
                                        'm_right' => null,
                                        'm_bottom' => null,
                                        'm_left' => '10px',
                                    ],
                                    [
                                        'x' => '5px',
                                        'y' => '5px',
                                        'col_number' => 4,
                                        'is_taken' => true,
                                        'm_top' => null,
                                        'm_right' => '10px',
                                        'm_bottom' => null,
                                        'm_left' => null,
                                    ],
                                ],
                            ],
                            [
                                'row_number' => 2,
                                'seats' => [
                                    [
                                        'x' => '5px',
                                        'y' => '5px',
                                        'col_number' => 1,
                                        'is_taken' => false,
                                        'm_top' => null,
                                        'm_right' => null,
                                        'm_bottom' => null,
                                        'm_left' => '10px',
                                    ],
                                    [
                                        'x' => '5px',
                                        'y' => '5px',
                                        'col_number' => 2,
                                        'is_taken' => true,
                                        'm_top' => null,
                                        'm_right' => null,
                                        'm_bottom' => null,
                                        'm_left' => null,
                                    ],
                                ],
                            ],
                        ],
                    ],
                ], true),
            ],
            [
                'id' => 3,
                'name' => 'Зал 1 VIP',
                'cinema_id' => 2,
                'hall_config_example' => json_encode([
                    'x' => "800px",
                    'y' => "400px",
                    'screen' => [
                        'x' => '500px',
                        'y' => null,
                        'curve_degree' => '5px',
                        'm-top' => null,
                        'm-right' => '150px',
                        'm-bottom' => null,
                        'm-left' => '150px',
                    ],
                    'seating_area' => [
                        'x' => '800px',
                        'y' => '360px',
                        'm-top' => null,
                        'm-right' => null,
                        'm-bottom' => null,
                        'm-left' => null,
                        'rows' => [
                            [
                                'row_number' => 1,
                                'seats' => [
                                    [
                                        'x' => '5px',
                                        'y' => '5px',
                                        'col_number' => 1,
                                        'is_taken' => true,
                                        'm_top' => null,
                                        'm_right' => null,
                                        'm_bottom' => null,
                                        'm_left' => '10px',
                                    ],
                                    [
                                        'x' => '5px',
                                        'y' => '5px',
                                        'col_number' => 2,
                                        'is_taken' => true,
                                        'm_top' => null,
                                        'm_right' => null,
                                        'm_bottom' => null,
                                        'm_left' => null,
                                    ],
                                    [
                                        'x' => '5px',
                                        'y' => '5px',
                                        'col_number' => 3,
                                        'is_taken' => false,
                                        'm_top' => null,
                                        'm_right' => null,
                                        'm_bottom' => null,
                                        'm_left' => '5px',
                                    ],
                                    [
                                        'x' => '5px',
                                        'y' => '5px',
                                        'col_number' => 4,
                                        'is_taken' => true,
                                        'm_top' => null,
                                        'm_right' => '10px',
                                        'm_bottom' => null,
                                        'm_left' => null,
                                    ],
                                ],
                            ]
                        ],
                    ],
                ], true),
            ],
        ];
        Hall::insert($halls);

        $seances = [
            [
                'show_time' => Carbon::now(),
                'price_adult' => 2000,
                'price_kid' => 700,
                'price_student' => 1200,
                'price_vip' => 5000,
                'movie_id' => 1,
                'hall_id' => 1,
                'hall_config' => Hall::where('id', 1)->value('hall_config_example'),
            ],
            [
                'show_time' => Carbon::now()->addDay(),
                'price_adult' => 2000,
                'price_kid' => 700,
                'price_student' => 1200,
                'price_vip' => 5000,
                'movie_id' => 1,
                'hall_id' => 2,
                'hall_config' => Hall::where('id', 2)->value('hall_config_example'),
            ],
            [
                'show_time' => Carbon::now()->addHours(2),
                'price_adult' => 2000,
                'price_kid' => 700,
                'price_student' => 1200,
                'price_vip' => 5000,
                'movie_id' => 2,
                'hall_id' => 1,
                'hall_config' => Hall::where('id', 1)->value('hall_config_example'),
            ],
            [
                'show_time' => Carbon::now()->addHours(3),
                'price_adult' => 2000,
                'price_kid' => 700,
                'price_student' => 1200,
                'price_vip' => 5000,
                'movie_id' => 3,
                'hall_id' => 2,
                'hall_config' => Hall::where('id', 2)->value('hall_config_example'),
            ],
            [
                'show_time' => Carbon::now()->addHours(3),
                'price_adult' => 3000,
                'price_kid' => 1700,
                'price_student' => 2500,
                'price_vip' => 8000,
                'movie_id' => 1,
                'hall_id' => 3,
                'hall_config' => Hall::where('id', 3)->value('hall_config_example'),
            ],
        ];
        Seance::insert($seances);
    }
}
