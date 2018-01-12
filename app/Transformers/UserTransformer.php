<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

use App\Transformers\StudentTransformer;
use App\Transformers\SchoolTransformer;
use App\Transformers\AbsentTransformer;
use App\User;

class UserTransformer extends TransformerAbstract
{

    protected $availableIncludes = [
        'schools', 'students', 'absents'

    ];

    //  protected $availableIncludes = [
    //     'students', 

    // ];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id'         => $user->id,
            'name'       => $user->name,
            'email'      => $user->email,
            'registered' => $user->created_at->diffForHumans(),
        ];
    }

    public function includeSchools(User $user)
    {
        $school = $user->schools()->LatesFirst()->get();
        return $this->collection($school, new SchoolTransformer);
    }

    public function includeStudents(User $user)
    {
        $student = $user->students()->get();
        return $this->collection($student, new StudentTransformer);
    }

    public function includeAbsents(User $user)
    {
        $absent = $user->absents()->get();
        return $this->collection($absent, new AbsentTransformer);
    }
}
