<?php

namespace App\Policies;

use App\Models\Seance;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SeancePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Seance $seance): bool
    {
        return $user->id === $seance->hall->cinema->user_id;
    }

    public function updateSeat(User $user, Seance $seance): bool
    {
        return $user->id === $seance->hall->cinema->user_id;
    }

    public function delete(User $user, Seance $seance): bool
    {
        return $user->id === $seance->hall->cinema->user_id;
    }
}
