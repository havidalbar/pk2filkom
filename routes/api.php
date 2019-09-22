<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['mahasiswa.api']], function () {
    Route::post('submit-tts/{slug}', 'JawabanController@apiSubmitTts')->name('api-submit-tts');
    Route::group(['as' => 'mahasiswa.'], function () {
        Route::group(['prefix' => 'penugasan', 'as' => 'penugasan.'], function () {
            Route::group(['prefix' => '{slug}'], function () {
                Route::group(['prefix' => '{index}', 'as' => 'pilihan-ganda.'], function () {
                    Route::get('/', 'JawabanController@getSoalPilihanGanda')->name('view');
                    Route::post('/', 'JawabanController@submitJawaban')->name('submit');
                });
            });
        });
    });
});
