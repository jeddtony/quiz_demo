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

Route::get('/start', function () {
    return view('startgame');
});

Route::post('/start', 'PlayerController@store');

Route::get('/playgame', function () {
    return view('playgame');
});

Route::get('/savegame', 'PlayerController@update');

Route::get('/showgame', function () {
    return redirect()->to('http://aricentvas.com/game');
});

Route::get('/chart', 'PlayerController@index');

Route::get('/scores', function() {
    return view('display-scores');
});