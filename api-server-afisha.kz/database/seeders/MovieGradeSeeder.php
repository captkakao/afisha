<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        DB::table('movie_user_grade')->insert([
            [
                'movie_id' => 1,
                'user_id' => 1,
                'grade' => random_int(0, 10),
            ],
            [
                'movie_id' => 2,
                'user_id' => 1,
                'grade' => random_int(0, 10),
            ],
            [
                'movie_id' => 3,
                'user_id' => 1,
                'grade' => random_int(0, 10),
            ],
            [
                'movie_id' => 4,
                'user_id' => 1,
                'grade' => random_int(0, 10),
            ],
            [
                'movie_id' => 5,
                'user_id' => 1,
                'grade' => random_int(0, 10),
            ],
            [
                'movie_id' => 6,
                'user_id' => 1,
                'grade' => random_int(0, 10),
            ],

            [
                'movie_id' => 1,
                'user_id' => 2,
                'grade' => random_int(0, 10),
            ],
            [
                'movie_id' => 2,
                'user_id' => 2,
                'grade' => random_int(0, 10),
            ],
            [
                'movie_id' => 3,
                'user_id' => 2,
                'grade' => random_int(0, 10),
            ],
            [
                'movie_id' => 4,
                'user_id' => 2,
                'grade' => random_int(0, 10),
            ],
            [
                'movie_id' => 5,
                'user_id' => 2,
                'grade' => random_int(0, 10),
            ],
            [
                'movie_id' => 6,
                'user_id' => 2,
                'grade' => random_int(0, 10),
            ],
        ]);
    }
}
