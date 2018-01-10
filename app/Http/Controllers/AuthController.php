<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\User;
use App\Transformers\UserTransformer;
use Auth;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request, User $user)
    {
       		$user = $user->create([
    				'name' 		=> $request->name,
    				'email'		=> $request->email,
    				'password'	=> bcrypt($request->password),
    				'api_token'	=> bcrypt($request->email)
    				]);

       		$response  = fractal()
    				->item($user)
    				->transformWith(new UserTransformer)
    				->addMeta(['token' => $user->api_token,])
    				->toArray();
					return response()->json($response, 201);
    }


    public function login(Request $request, User $user)
    {
    	if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    		return response()->json(['error' => 'Your credential is wrong'], 401);
    	}

    	$user = $user->find(Auth::user()->id);
    	return fractal()
    			->item($user)
    			->transformWith(new UserTransformer)
    			->addMeta([
    				'token' => $user->api_token,
    			         ])
    			->toArray();	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
