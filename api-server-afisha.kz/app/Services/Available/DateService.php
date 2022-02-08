<?php

namespace App\Services\Available;

use Illuminate\Support\Facades\App;

class DateService
{
    // TODO Cache date
    const DAYS_OF_THE_WEEK_EN = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    const DAYS_OF_THE_WEEK_RU = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];
    const DAYS_OF_THE_WEEK_KZ = ['Дүйсенбі', 'Сейсенбі', 'Сәрсенбі', 'Бейсенбі', 'ЖҰма', 'Сенбі', 'Жексенбі'];

    private string $today, $tomorrow;

    public function __construct()
    {
        $this->today = $this->getTranslatedDayOfTheWeek(date('Y-m-d h:i:s l'));
        $this->tomorrow = $this->getTranslatedDayOfTheWeek(date('Y-m-d h:i:s l', strtotime('tomorrow')));
    }

    private function getTranslatedDayOfTheWeek(string $date)
    {
        $pieces = explode(' ', $date);
        $indexOfWeek = array_search($pieces[2], self::DAYS_OF_THE_WEEK_EN);

        switch (App::currentLocale()) {
            case 'ru':
                $date = $pieces[0] . ' ' . $pieces[1] . ' ' . self::DAYS_OF_THE_WEEK_RU[$indexOfWeek];
                break;
            case 'kz':
                $date = $pieces[0] . ' ' . $pieces[1] . ' '. self::DAYS_OF_THE_WEEK_KZ[$indexOfWeek];
                break;
        }
        return $date;
    }

    public function getToday()
    {
        return $this->today;
    }

    public function getTomorrow()
    {
        return $this->tomorrow;
    }
}
