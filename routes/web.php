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
    return view('v_mahasiswa/halamanAwal');
});
Route::get('/isi-data-diri', function () {
    return view('v_mahasiswa/formDataDiri');
});
Route::get('/berita', function () {
    return view('v_mahasiswa/detailBerita');
});
Route::get('/multipleChoise', function () {
    return view('v_mahasiswa/multipleChoise');
});
Route::get('/penugasan', function () {
    return view('v_mahasiswa/penugasan');
});

Route::get('/login', 'AuthController@index');
Route::post('/login-mahasiswa', 'AuthController@loginMahasiswa');
Route::get('/isi-biodata', 'AuthController@getBiodata');
Route::post('/isi-biodata', 'AuthController@postBiodata');
Route::get('/logout', 'AuthController@logout');

Route::get('/buat-pos-baru', function () {
    return view('new-post');
});
Route::post('/buat-pos-baru', 'PostController@postPost');
Route::post('/edit-pos/{id}', 'PostController@postPost');
Route::get('/edit-pos/{id}', 'PostController@editPost');
Route::get('/pos/{id}', 'PostController@showPost');

Route::get('/test-package', 'PackageTestController@index');
Route::get('/test-mPDF', 'PackageTestController@mPDF');
Route::get('/test-PhpSpreadsheet', 'PackageTestController@PhpSpreadsheet');
