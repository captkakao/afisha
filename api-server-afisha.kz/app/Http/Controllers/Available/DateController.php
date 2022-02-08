<?php

namespace App\Http\Controllers\Available;

use App\Http\Controllers\Controller;
use App\Services\Available\DateService;

class DateController extends Controller
{
    public function getDate(DateService $service)
    {
        return response()->json([
            'today' => $service->getToday(),
            'tomorrow' => $service->getTomorrow(),
        ]);
    }
}
