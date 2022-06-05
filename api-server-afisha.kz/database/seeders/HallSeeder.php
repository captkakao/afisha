<?php

namespace Database\Seeders;

use App\Models\Hall;
use Illuminate\Database\Seeder;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
                                        'col_number' => 2,
                                        'is_taken' => false,
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
                                        'is_taken' => false,
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
    }
}
