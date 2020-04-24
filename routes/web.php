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

// Route::get('/', 'MainController@actionIndex');
// Route::get('/show', 'MainController@actionFindOne');
// Route::get('/add', 'MainController@actionAdd');
// Route::post('/save', 'MainController@actionSave');
// Route::get('/delete', 'MainController@actionDelete');
Route::get('/recieveMessage','GuzzleController@getMessage');
Route::post('/sendMessage','GuzzleController@sendMessage');
