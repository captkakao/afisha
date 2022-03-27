<?php

namespace App\Http\Controllers;

use App\Services\Auth\AuthTokenService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        return AuthTokenService::checkForAuth('4QhKxWAqJNgUzHLO1xGUAYt6j2bkknlQjwyf1yLH');
        return auth('sanctum')->check();
    }
}
