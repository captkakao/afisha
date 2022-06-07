<?php

namespace Database\Seeders;

use App\Models\Hall;
use App\Models\Seance;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SeanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seance::factory(300)->create();
//        $seances = [
//            [
//                'show_time' => Carbon::now(),
//                'price_adult' => 2000,
//                'price_kid' => 700,
//                'price_student' => 1200,
//                'price_vip' => 5000,
//                'movie_id' => 1,
//                'hall_id' => 1,
//                'hall_config' => Hall::where('id', 1)->value('hall_config_example'),
//            ],
//            [
//                'show_time' => Carbon::now()->addDay(),
//                'price_adult' => 2000,
//                'price_kid' => 700,
//                'price_student' => 1200,
//                'price_vip' => 5000,
//                'movie_id' => 1,
//                'hall_id' => 2,
//                'hall_config' => Hall::where('id', 2)->value('hall_config_example'),
//            ],
//            [
//                'show_time' => Carbon::now()->addHours(2),
//                'price_adult' => 2000,
//                'price_kid' => 700,
//                'price_student' => 1200,
//                'price_vip' => 5000,
//                'movie_id' => 2,
//                'hall_id' => 1,
//                'hall_config' => Hall::where('id', 1)->value('hall_config_example'),
//            ],
//            [
//                'show_time' => Carbon::now()->addHours(3),
//                'price_adult' => 2000,
//                'price_kid' => 700,
//                'price_student' => 1200,
//                'price_vip' => 5000,
//                'movie_id' => 3,
//                'hall_id' => 2,
//                'hall_config' => Hall::where('id', 2)->value('hall_config_example'),
//            ],
//            [
//                'show_time' => Carbon::now()->addHours(3),
//                'price_adult' => 3000,
//                'price_kid' => 1700,
//                'price_student' => 2500,
//                'price_vip' => 8000,
//                'movie_id' => 1,
//                'hall_id' => 3,
//                'hall_config' => Hall::where('id', 3)->value('hall_config_example'),
//            ],
//
//        ];
//        Seance::insert($seances);
    }
}
