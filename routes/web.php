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
    return view('index');
});
Route::get('/dokter', function () {
	return view('dokter/main');
});
Route::resource('/dokter/pemeriksaan', 'PeriksaController');
Route::resource('/dokter/pemeriksaan/{pemeriksaan}', 'PeriksaController@update');

Route::post('/tambahData', 'PeriksaController@store');
