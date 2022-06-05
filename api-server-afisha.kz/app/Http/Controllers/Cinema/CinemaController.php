<?php

namespace App\Http\Controllers\Cinema;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cinema\CreateCinemaRequest;
use App\Http\Requests\Cinema\GetSeancesRequest;
use App\Http\Requests\Cinema\UpdateCinemaRequest;
use App\Http\Resources\Cinema\CinemaCollection;
use App\Http\Resources\Cinema\CinemaResource;
use App\Models\Cinema;
use App\Models\City;
use App\Repositories\Cinema\CinemaRepository;
use App\Repositories\HallRepository;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\Response;

class CinemaController extends Controller
{
    public function getCityCinemas(City $city): CinemaCollection
    {
        $cinemas = CinemaRepository::getByCityId($city->id);
        return new CinemaCollection($cinemas);
    }

    #[Pure] public function getCinema(Cinema $cinema): CinemaResource
    {
        return new CinemaResource($cinema);
    }

    public function getSeances(GetSeancesRequest $request, Cinema $cinema)
    {
        $datetime = $request->datetime;
        $date = Carbon::parse($datetime)->toDateString();

        return HallRepository::paginateSeancesForToday($cinema->id, $datetime, $date);
    }

    public function getUserCinemas(): CinemaCollection
    {
        $userCinemas = Auth::user()->cinemas;
        return new CinemaCollection($userCinemas);
    }

    public function create(CreateCinemaRequest $request): JsonResponse
    {
        $cinema = CinemaRepository::create($request->name, $request->description, $request->phone, $request->address, $request->city_id, Auth::id());
        return response()->json([
            'id' => $cinema->id,
        ], Response::HTTP_CREATED);
    }

    public function update(UpdateCinemaRequest $request, Cinema $cinema)
    {
        CinemaRepository::update($cinema->id, $request->name, $request->description, $request->phone, $request->address, $request->city_id, Auth::id());
        return response(null, Response::HTTP_OK);
    }

    public function delete(Cinema $cinema)
    {
        $cinema->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
