<?php

namespace App\Policies;

use App\User;
use App\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function update(User $user, Student $student)
    {
        return $user->ownsStudent($student);
    }

    public function delete(User $user, Student $student)
    {
        return $user->ownsStudent($student);
    }
}
