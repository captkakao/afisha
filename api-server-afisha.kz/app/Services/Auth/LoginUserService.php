<?php

namespace App\Services\Auth;

use App\Exceptions\ApiResponseException;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginUserService
{
    public function handleLogin(string $email, string $password)
    {
        if (!Auth::attempt(['email' => $email, 'password' => $password]))
            throw new ApiResponseException(__('auth.failed'), 'invalid_credentials', Response::HTTP_UNAUTHORIZED);
        $user = Auth::user();
        if (!$user->hasVerifiedEmail())
            throw new ApiResponseException(__('auth.email_not_confirmed'), 'email_confirmation');
        return $this->createAuthToken($user);
    }

    private function createAuthToken(User|Authenticatable $user)
    {
        return $user->createToken($user->email)->plainTextToken;
    }
}
