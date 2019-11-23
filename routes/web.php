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

Route::resource('/periksa', 'PeriksaController');
Route::resource('/pengguna', 'PenggunaController');
Route::resource('/resep', 'ResepController');
Route::resource('/pasien', 'PasienController');

Auth::routes([
    'register' => false, // Registration Routes...
]);

Route::get('/home', 'HomeController@index')->name('home.index');
