<?php

Route::get('/', function () {
    return view('index');
});


Route::get('/register','regisController@getRegis');
Route::post('register', 'regisController@postRegis');

Route::post('/','loginController@postLogin');

Route::get('logout','backendController@logout');

Route::get('dashboard','adminController@getDashboard');
