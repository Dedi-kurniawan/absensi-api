<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

use Illuminate\Http\Request;
use App\Transformers\UserTransformer;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users(User $user)
    {
        $users = User::all();
        
        return fractal()
                ->collection($users)
                ->transformWith(new UserTransformer)
                ->toArray();
    }

    public function profile(User $user)
    {
        $user = $user->find(Auth::user()->id);
        return fractal()
                ->item($user)
                ->transformWith(new UserTransformer)
                ->includeSchools()
                ->toArray();    
    }
}
