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
                'name' => 'English',
                'code' => 'en',
            ],
            [
                'name' => 'Русский',
                'code' => 'ru',
            ],
            [
                'name' => 'Қазақша',
                'code' => 'kz',
            ],
        ];
        Language::insert($languages);
    }
}
