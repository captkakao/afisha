<?php

namespace App\Policies;

use App\Models\Hall;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HallPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Hall $hall): bool
    {
        return $user->id === $hall->cinema->user_id;
    }

    public function delete(User $user, Hall $hall)
    {
        return $user->id === $hall->cinema->user_id;
    }
}
