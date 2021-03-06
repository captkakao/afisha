<?php

namespace Database\Seeders;

use App\Models\Cinema;
use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
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
                'name' => 'Chaplin MEGA Alma-Ata',
                'description' => 'Совершенно новый кинотеатр по знакомому адресу. Самый большой мегаплекс в Центральной Азии, расположенный в одном из самых посещаемых торгово-развлекательных центров Казахстана. На общей площади кинотеатра 8 572 кв.м. расположены 15 залов. В семи залах предусмотрены балконы с местами повышенной комфортности. Особенность мегаплекса - детский зал со специальными пуфиками и диванами вместо обычных кресел, игровая зона и помещения для проведения детских праздников.',
                'address' => 'ул. Розыбакиева, 247А, ТРЦ «MEGA Alma-Ata», 2-й этаж',
                'phone' => '77471740607',
                'city_id' => 3, // Almaty
                'user_id' => 1, // Fiko Joy
            ],
            [
                'name' => 'Chaplin MEGA Park',
                'description' => 'Девятизальный мультиплекс в торговом центре MEGA Park. Все залы оборудованы кинопроекторами Christie, в 5 залах установлена система RealD 3D, 8-й и 9-й залы оснащены передовой системой звука Dolby Atmos и оборудованием 4K. Все 9 залов имеют одинаково большие экраны, их ширина составляет 12,5 метров. Два зала имеют зоны повышенного комфорта – премиум-зоны с отдельными входом. В каждом кинозале предусмотрены места для людей с особыми потребностями. На территории лобби расположены консешн-бар, сэндвич-бар, кафе, игровая зона и библиотека.',
                'address' => 'ул. Макатаева, 127, 3-й этаж',
                'phone' => '77075009132',
                'city_id' => 3, // Almaty
                'user_id' => 1, // Fiko Joy
            ],
            [
                'name' => 'Chaplin ADK 3D',
                'description' => 'Chaplin ADK 3D – это шестизальный кинотеатр с двумя барами: консешн-зоной с попкорном и газированными напитками, а также кофе-баром с высокоскоростным интернетом. Кинотеатр работает с 10.00 до 02.00 ночи.',
                'address' => 'ул. Сатпаева, 90 (уг. ул. Тлендиева), ТРК «АDК», 2-й этаж',
                'phone' => '77273308770',
                'city_id' => 3, // Almaty
                'user_id' => 1, // Fiko Joy
            ],
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
    }
}
