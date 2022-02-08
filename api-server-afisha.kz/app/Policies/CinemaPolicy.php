<?php

namespace App\Policies;

use App\Models\Cinema;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CinemaPolicy
{
    use HandlesAuthorization;

    public function createHall(User $user, Cinema $cinema): bool
    {
        return $user->id === $cinema->user_id;
    }

    public function update(User $user, Cinema $cinema): bool
    {
        return $user->id === $cinema->user_id;
    }

    public function delete(User $user, Cinema $cinema): bool
    {
        return $user->id === $cinema->user_id;
    }
}
