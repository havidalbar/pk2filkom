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
    return view('landing-page');
});

Route::get('/login', 'AuthController@index');
Route::post('/login-mahasiswa', 'AuthController@loginMahasiswa');
Route::get('/isi-biodata', 'AuthController@getBiodata');
Route::post('/isi-biodata', 'AuthController@postBiodata');
Route::get('/logout', 'AuthController@logout');

Route::get('/buat-artikel', 'ArtikelController@createArtikel');
Route::post('/buat-artikel', 'ArtikelController@postArtikel');
Route::get('/artikel/{slug}/edit', 'ArtikelController@createArtikel');
Route::post('/artikel/{slug}/edit', 'ArtikelController@postArtikel');
Route::get('/artikel/{slug}', 'ArtikelController@showArtikel');

Route::get('/test-package', 'PackageTestController@index');
Route::get('/test-mPDF', 'PackageTestController@mPDF');
Route::get('/test-PhpSpreadsheet', 'PackageTestController@PhpSpreadsheet');
