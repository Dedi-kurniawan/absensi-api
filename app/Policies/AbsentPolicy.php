<?php

namespace App\Policies;

use App\User;
use App\Absent;
use Illuminate\Auth\Access\HandlesAuthorization;

class AbsentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function update(User $user, Absent $absent)
    {
        return $user->ownsAbsent($absent);
    }

    public function delete(User $user, Absent $absent)
    {
        return $user->ownsAbsent($absent);
    }
}
