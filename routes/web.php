<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// user routes
Route::get('/student/{id}/delete', 'UserController@destroy');
Route::get('/student/{id}/edit', 'UserController@edit');
Route::put('/student/{id}/update', 'UserController@update');

//user photos routes
Route::get('/photo/{id}/delete', 'UserPhotoController@destroy');
Route::get('/photo/{id}/edit', 'UserPhotoController@edit');
Route::put('/photo/{id}/update', 'UserPhotoController@update');




