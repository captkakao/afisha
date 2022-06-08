<?php

namespace App\Http\Controllers;

use App\Http\Resources\Image\ImageCollection;
use App\Models\Image;
use App\Models\Movie;
use App\Models\MovieDetail;
use App\Models\Seance;
use App\Services\Auth\AuthTokenService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $movie = Movie::where('id', 7)
            ->first();

        dd($movie->favouriteUsers()->where('user_id', 2)->exists());
    }
}
