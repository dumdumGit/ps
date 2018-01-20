<?php

Route::get('/', 'getController@getIndex');

Route::get('profil', 'getController@getProfil');

Route::get('berita', function () {
    return view('berita');
});

//<start bagian tamu/guest
Route::get('register','regisController@getRegis');
Route::post('register', 'regisController@postRegis');
Route::post('/','loginController@postLogin');
//end>

//controller admin
Route::get('logout','backendController@logout');
Route::get('dashboard','adminController@getDashboard');

//pengguna khusus Super_Admin
Route::get('pengguna','SuperAdminController@getPengguna');
Route::get('pengguna/ajax', 'SuperAdminController@dataPengguna')->name('pengguna/ajax');
Route::post('pengguna', 'SuperAdminController@posregisnya');
Route::get('pengguna/{id}/edit', 'SuperAdminController@edit');
Route::get('pengguna/{id}/delete', 'SuperAdminController@delete');
Route::put('pengguna/{id}', 'SuperAdminController@update');
Route::delete('pengguna/{id}', 'SuperAdminController@destroy');

//aturberita
Route::get('aturberita','adminController@getAturBerita');
Route::get('berita/ajax', 'adminController@dataBeritaDT')->name('berita/ajax');
Route::get('berita/baru','adminController@getBeritaBaru');
Route::post('berita/baru', 'adminController@postBeritaBaru');
Route::get('berita/{id}/edit', 'adminController@editBerita');
Route::put('berita/{id}', 'adminController@updateBerita');
Route::get('berita/{id}/delete', 'adminController@deleteBerita');
Route::delete('berita/{id}', 'adminController@destroyBerita');
Route::get('berita/{slug}','adminController@getBeritaSingle');

//publikasi
Route::get('aturpublikasi','adminController@getAturPublikasi');
Route::get('publikasi/json', 'adminController@dataPublikasiDT')->name('Publikasi/json');
Route::get('publikasi/baru','adminController@getPublikasiBaru');
Route::post('publikasi/baru', 'adminController@storepublikasiBaru');
Route::get('publikasi/{id}/rename','adminController@getRenamePublikasi');
Route::put('publikasi/{id}', 'adminController@update_Publikasi');
Route::get('publikasi/{id}/edit','adminController@getEditPublikasi');
Route::get('publikasi/{id}/delete ','adminController@destroyPublikasi');

//files
Route::get('aturfile','adminController@getAturFile');
Route::get('file/ajax', 'adminController@dataFileDT')->name('file/ajax');
Route::get('file/baru','adminController@getFileBaru');
Route::post('file/baru', 'adminController@StoreFileBaru');
Route::get('file/{id}/delete', 'adminController@DestroyFilebaru');

//riset
Route::get('riset/baru', 'adminController@getTambahRiset');
Route::get('aturriset', 'adminController@getAturRiset');
Route::post('riset/baru', 'adminController@PostRisetBaru');
Route::get('riset/ajax', 'adminController@dataRisetDT')->name('riset/ajax');
Route::get('riset/{id}/edit', 'adminController@editRiset');
Route::put('riset/{id}', 'adminController@risetUpdate');
Route::get('riset/{id}/delete', 'adminController@deleteRiset');
Route::delete('riset/{id}', 'adminController@destroyRiset');
Route::get('riset/{slug}','adminController@getRisetSingle');

//atursitus
Route::get('aturheader','SuperAdminController@getAturUtama');
Route::put('aturheader/update','SuperAdminController@updateUtama');
Route::get('aturprofil', 'SuperAdminController@getAturLamanProfil');
Route::put('aturprofil/update', 'SuperAdminController@updateLamanProfil');


//Route::get('kegiatan/{slug}','adminController@getKegiatanSingle');
//<start bagian auth only... another rule maybe...

//end>
