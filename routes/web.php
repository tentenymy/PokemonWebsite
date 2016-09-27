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
    return view('welcome');
});

// Model 
Route::resource('trainers', 'TrainersController');
Route::resource('pokes', 'PokesController');
Route::resource('trainer.poke_trainer', 'PokeTrainerController');

// Auth
Auth::routes();
Route::get('/home', 'TrainersController@index');

// Error
Route::get('/errors', function() {
	return view('errors.index');
});

// Message
Route::get('/welcome', function () {
    return view('welcome');
});
