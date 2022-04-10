<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use App\Services\Auth\AuthTokenService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $seance = Seance::find(2);
        return json_decode($seance->hall_config, true);
    }
}
