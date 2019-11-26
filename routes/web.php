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
    return redirect('/login');
});

Route::group(['middleware' => ['web', 'auth', 'peran']],function ()
{   
    Route::get('/pasien/cari-pasien', 'PasienController@search')->name('pasien.search');

    Route::get('/profil', 'PenggunaController@profil')->name('profil');
    Route::get('/profil/ubah-profil', 'PenggunaController@ubahProfil')->name('profil.ubah');
    Route::patch('/profil', 'PenggunaController@updateProfil')->name('profil.update');
    Route::get('/profil/ganti-password', 'PenggunaController@showChangePassword')->name('profil.password');
    Route::put('/profil/ganti-password', 'PenggunaController@changePassword')->name('profil.update_password');

    Route::group(['peran'=> 'Super Admin'],function(){
        Route::resource('/pengguna', 'PenggunaController');
        Route::put('/pengguna/reset/{pengguna}/password', 'PenggunaController@resetPassword')->name('pengguna.reset');
    });

    Route::group(['peran'=> 'Dokter'],function(){
        Route::post('/periksa/ajax/get-data-periksa', 'PeriksaController@getDataPeriksa')->name('ajax.get.data.periksa');
        Route::get('/periksa/create/{pasien}', 'PeriksaController@create')->name('periksa.create');
        Route::post('/periksa/{pasien}', 'PeriksaController@store')->name('periksa.store');
        Route::patch('/periksa/{periksa}', 'PeriksaController@update')->name('periksa.update');
        Route::delete('/periksa/{periksa}', 'PeriksaController@destroy')->name('periksa.destroy');
    });

    Route::group(['peran'=> 'Administrator'],function(){
        Route::resource('/pasien', 'PasienController');
    });

    Route::group(['peran'=> ['Administrator','Dokter']],function(){
        Route::get('/pasien', 'PasienController@index')->name('pasien.index');
        Route::get('/pasien/{pasien}', 'PasienController@show')->name('pasien.show');
    });

});

Auth::routes([
    'register' => false,// Registration Routes...
]);

Route::get('/home', function ()
{
    if (auth()->user()->peran->peran == "Super Admin") {
        return redirect()->route('pengguna.index');
    } else {
        return redirect()->route('pasien.index');
    }
    
})->name('home.index');
