<?php

namespace App\Services\User;

use App\Repositories\User\UserDataRepository;
use App\Services\Auth\AuthTokenService;
use Illuminate\Support\Facades\Auth;

class UpdateUserPasswordService
{
    public function handlePasswordUpdate(string $newPassword)
    {
        $user = Auth::user();
        UserDataRepository::updatePassword($user, $newPassword);
        AuthTokenService::resetAllSessionExceptCurrent($user);
    }
}
