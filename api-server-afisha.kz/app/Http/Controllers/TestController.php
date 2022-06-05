<?php

namespace App\Http\Controllers;

use App\Models\MovieDetail;
use App\Models\Seance;
use App\Services\Auth\AuthTokenService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $movieDetail = MovieDetail::with('casts')->first();

        return $movieDetail;
    }
}
