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



Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');
    Route::resource('user', 'UserController');
    Route::resource('pasien', 'PasienController');
    Route::resource('dokter', 'DokterController');
    Route::resource('obat', 'ObatController');
    Route::resource('berobat', 'BerobatController');
    Route::put('berobat/{id}/hapusobat', 'BerobatController@hapusObat')->name('berobat.hapusobat');
});
