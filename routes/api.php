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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//APi routes

	//users
Route::get('/students', 'API\Usercontroller@index');
Route::post('/student', 'API\Usercontroller@store');
Route::get('/student/{id}/show', 'API\Usercontroller@show');
Route::get('/student/{id}/delete', 'API\Usercontroller@destroy');
Route::put('/student/{id}/update', 'API\Usercontroller@update');


//photos

Route::get('/photos', 'API\UserPhotoController@index');
Route::get('/photo/{id}/show', 'API\UserPhotoController@show');
Route::get('/photo/{id}/delete', 'API\UserPhotoController@destroy');
Route::put('/photo/{id}/update', 'API\UserPhotoController@update');
