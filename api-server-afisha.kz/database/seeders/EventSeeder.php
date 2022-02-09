<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'title' => '«Бэтмен» станет самым продолжительным фильмом о супергерое DC',
                'description' => 'Seom batman description',
                'cinema_id' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'title' => 'В Chaplin MEGA Park скидки 90%',
                'description' => 'Seom batman description',
                'cinema_id' => 2,
                'created_at' => Carbon::now(),
            ],
        ];
        Event::insert($events);
    }
}
