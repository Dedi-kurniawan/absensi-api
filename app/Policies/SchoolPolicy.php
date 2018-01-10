<?php

namespace App\Policies;

use App\User;
use App\School;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchoolPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function update(User $user, School $school)
    {
        return $user->ownsSchool($school);
    }

    public function destroy(User $user, School $school)
    {
        return $user->ownsSchool($school);
    }
}
