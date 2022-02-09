<?php

namespace App\Http\Controllers\Seance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seance\CreateSeanceRequest;
use App\Models\Seance;

class SeanceController extends Controller
{
    public function create(CreateSeanceRequest $request)
    {
        $seance = Seance::create([
            'price_adult' => $request->price_adult,
            'price_kid' => $request->price_kid,
            'price_student' => $request->price_student,
            'price_vip' => $request->price_vip,
            'show_time' => $request->show_time,
            'movie_id' => $request->movie_id,
            'hall_id' => $request->hall_id,
        ]);

        return response()->json([
            'id' => $seance->id,
        ]);
    }

    public function update()
    {

    }

    public function updateSeat()
    {

    }

    public function delete()
    {

    }
}
