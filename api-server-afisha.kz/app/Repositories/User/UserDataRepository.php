<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

class UserDataRepository
{
    public static function updateProfile(User|Authenticatable $user, string $firstName, string $lastName, string $birthdate)
    {
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->birthdate = $birthdate;
        $user->save();
    }

    public static function updatePassword(User|Authenticatable $user, string $password)
    {
        $user->password = bcrypt($password);
        $user->save();
    }

    public static function removeAvatarFilename(User|Authenticatable $user)
    {
        $user->avatar = null;
        $user->save();
    }

    public static function storeAvatarFilename(User|Authenticatable $user, string $filePath)
    {
        $user->avatar = $filePath;
        $user->save();
    }
}
