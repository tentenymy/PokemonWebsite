<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('trainers', 'TrainersController');
Route::resource('pokes', 'PokesController');

Auth::routes();
Route::get('/home', 'TrainersController@index');

Route::get('/errors', function() {
	return view('errors.index');
});
