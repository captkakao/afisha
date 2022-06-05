<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            [
                'id' => 1,
                'name' => 'English',
                'code' => 'en',
            ],
            [
                'id' => 2,
                'name' => 'Русский',
                'code' => 'ru',
            ],
            [
                'id' => 3,
                'name' => 'Қазақша',
                'code' => 'kz',
            ],
        ];
        Language::insert($languages);
    }
}
