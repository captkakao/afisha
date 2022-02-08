<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\User\UserDataRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Storage;

class DeleteAvatarService
{
    public function handleAvatarDelete(User|Authenticatable $user)
    {
        if ($user->avatar) {
            Storage::delete($user->avatar);
            UserDataRepository::removeAvatarFilename($user);
        }
    }
}
