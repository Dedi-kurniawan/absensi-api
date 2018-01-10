<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

use App\Transformers\SchoolTransformer;
use App\User;

class UserTransformer extends TransformerAbstract
{

    protected $availableIncludes = [
        'schools'

    ];
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
}
