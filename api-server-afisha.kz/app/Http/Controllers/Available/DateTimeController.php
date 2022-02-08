<?php

namespace App\Http\Controllers\Available;

use App\Http\Controllers\Controller;
use App\Services\Available\DateService;

class DateTimeController extends Controller
{
    public function getDateTime(DateService $dateService)
    {
        return response()->json([
            'today' => $dateService->getToday(),
            'tomorrow' => $dateService->getTomorrow(),
        ]);
    }
}
