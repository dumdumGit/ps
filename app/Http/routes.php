<?php

Route::get('/', function () {
    return view('index');
});

Route::get('profil', function () {
    return view('profil');
});

Route::get('berita', function () {
    return view('berita');
});

//<start bagian tamu/guest
Route::get('register','regisController@getRegis');
Route::post('register', 'regisController@postRegis');
Route::post('/','loginController@postLogin');
//end>



//<start bagian auth only... another rule maybe...

//end>

//adminController bagian Rule admin
Route::get('logout','backendController@logout');
Route::get('dashboard','adminController@getDashboard');
Route::get('pengguna','adminController@getPengguna');
Route::get('pengguna/ajax', 'getController@dataPengguna')->name('pengguna/ajax');

Route::post('pengguna', 'adminController@posregisnya');
Route::get('pengguna/{id}/edit', 'adminController@edit');
Route::get('pengguna/{id}/delete', 'adminController@delete');
Route::put('pengguna/{id}', 'adminController@update');
Route::delete('pengguna/{id}', 'adminController@destroy');




























//<start bagian auth only... another rule maybe...

//end>
