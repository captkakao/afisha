<?php

namespace App\Http\Controllers\Seance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seance\CreateSeanceRequest;
use App\Http\Requests\Seance\UpdateSeanceRequest;
use App\Http\Requests\Seance\UpdateSeatRequest;
use App\Models\Seance;
use Symfony\Component\HttpFoundation\Response;

class SeanceController extends Controller
{
    public function create(CreateSeanceRequest $request)
    {
        $seance = Seance::create([
            'show_time' => $request->show_time,
            'price_adult' => $request->price_adult,
            'price_kid' => $request->price_kid,
            'price_student' => $request->price_student,
            'price_vip' => $request->price_vip,
            'movie_id' => $request->movie_id,
            'hall_id' => $request->hall_id,
        ]);

        return response()->json([
            'id' => $seance->id,
        ]);
    }

    public function update(UpdateSeanceRequest $request, Seance $seance)
    {
        $seance->show_time = $request->show_time;
        $seance->price_adult = $request->price_adult;
        $seance->price_kid = $request->price_kid;
        $seance->price_student = $request->price_student;
        $seance->price_vip = $request->price_vip;
        $seance->movie_id = $request->movie_id;
        $seance->hall_id = $request->hall_id;
        $seance->save();

        return response(null);
    }

    public function updateSeat(UpdateSeatRequest $request, Seance $seance)
    {
        // TODO seat_config
    }

    public function delete(Seance $seance)
    {
        $seance->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
