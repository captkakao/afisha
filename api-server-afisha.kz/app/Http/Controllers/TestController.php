<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\MovieDetail;
use App\Models\Seance;
use App\Services\Auth\AuthTokenService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        return Image::all();
    }
}
