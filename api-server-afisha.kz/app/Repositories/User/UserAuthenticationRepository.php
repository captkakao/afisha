<?php

namespace App\Repositories\User;

use App\Models\User;

class UserAuthenticationRepository
{
    public static function create(string $firstName, string $lastName, string $email, string $password)
    {
        return User::create([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'password' => $password,
        ]);
    }
}
