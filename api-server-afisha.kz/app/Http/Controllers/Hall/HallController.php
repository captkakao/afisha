<?php

namespace App\Http\Controllers\Hall;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hall\CreateHallRequest;
use App\Http\Requests\Hall\UpdateHallRequest;
use App\Http\Resources\Hall\HallCollection;
use App\Models\Cinema;
use App\Models\Hall;
use App\Repositories\HallRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class HallController extends Controller
{
    public function getHalls(Cinema $cinema): HallCollection
    {
        return new HallCollection($cinema->halls()->paginate());
    }

    public function createHall(Cinema $cinema, CreateHallRequest $request): JsonResponse
    {
        // TODO frontend must endode json for seat_config
        $hall = HallRepository::create($request->name, json_encode($request->seat_config_example), $cinema->id);

        return response()->json([
            'id' => $hall->id,
        ], Response::HTTP_CREATED);
    }

    public function updateHall(Hall $hall, UpdateHallRequest $request)
    {
        // TODO frontend must endode json for seat_config
        HallRepository::update($request->name, json_encode($request->seat_config_example), $hall);

        return response(null);
    }

    public function deleteHall(Hall $hall)
    {
        $hall->delete();

        return response()->noContent();
    }
}
