<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\ApiResponseException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Repositories\User\UserAuthenticationRepository;
use App\Services\Auth\AuthTokenService;
use App\Services\Auth\LoginUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(LoginUserRequest $request, LoginUserService $service)
    {
        try {
            $authToken = $service->handleLogin($request->email, $request->password);
        } catch (ApiResponseException $exception) {
            throw $exception;
        }
        return response()->json(['auth_token' => $authToken], Response::HTTP_CREATED);
    }

    public function register(RegisterUserRequest $request)
    {
        UserAuthenticationRepository::create($request->first_name, $request->last_name, $request->email, bcrypt($request->password));
        return response(null, Response::HTTP_CREATED);
    }

    public function logout(AuthTokenService $service)
    {
        $service->deleteAuthToken(Auth::user());
    }

    public function logoutAnother(AuthTokenService $service)
    {
        $service->resetAllSessionExceptCurrent(Auth::user());
    }
}
