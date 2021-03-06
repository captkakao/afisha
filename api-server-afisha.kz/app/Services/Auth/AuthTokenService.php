<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Sanctum\PersonalAccessToken;

class AuthTokenService
{
    public function deleteAuthToken(Authenticatable|User $user): void
    {
        $user->currentAccessToken()->delete();
    }

    public static function resetAllSessionExceptCurrent(Authenticatable|User $user): void
    {
        $currentToken = $user->currentAccessToken();
        $user->tokens()->where('id', '!=', $currentToken->id)->delete();
    }

    public static function resetAllSession(Authenticatable|User $user): void
    {
        $user->tokens()->delete();
    }

    public static function checkForAuth(string $token)
    {
        $accessToken = PersonalAccessToken::findToken($token);
        return $accessToken?->tokenable;
    }

}
