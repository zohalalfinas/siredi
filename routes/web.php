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

    Route::group(['peran'=> 'Super Admin'],function(){
        Route::resource('/pengguna', 'PenggunaController');
    });
    Route::group(['peran'=> 'Dokter'],function(){
        Route::resource('/periksa', 'PeriksaController');
        Route::resource('/resep', 'ResepController');
    });
    Route::group(['peran'=> 'Administrator'],function(){
        Route::resource('/pasien', 'PasienController')->except(['pasien.index']);
    });
    Route::group(['peran'=> ['Administrator','Dokter']],function(){
        Route::get('/pasien', 'PasienController@index')->name('pasien.index');
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
