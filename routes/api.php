<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::resource('register', 'AuthController');
Route::post('login', 'AuthController@login');


Route::get('users', 'UserController@users');
Route::get('users/profile', 'UserController@profile')->middleware('auth:api');

// Route::resource('school', 'SchoolController')->middleware('auth:api');
// Route::put('school/{school}', 'SchoolController@update')->middleware('auth:api');
// Route::get('school', 'SchoolController@index')->middleware('auth:api');
// Route::post('school', 'SchoolController@store')->middleware('auth:api');
Route::resource('school', 'SchoolController')->middleware('auth:api');
Route::resource('student', 'StudentController')->middleware('auth:api');