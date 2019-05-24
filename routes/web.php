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
Route::get('/berita', function () {
    return view('v_mahasiswa/detailBerita');
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

// Admin Panel
Route::group(['prefix' => 'panel', 'as' => 'panel.'], function () {
    Route::get('/', function () {
        return redirect()->route('panel.dashboard');
    })->name('index');

    Route::group(['middleware' => ['admin.login']], function () {
        Route::get('login', 'AdminController@getLogin')->name('login');
        Route::post('login', 'AdminController@login');
    });

    Route::group(['middleware' => ['admin']], function () {
        Route::post('logout', 'AdminController@logout')->name('logout');
        Route::get('dashboard', 'AdminController@getDashboard')->name('dashboard');

        // DIVISI UMUM
        Route::get('biodata-mahasiswa', 'adminPanel@dataBiodataMahasiswa');
        Route::get('kesehatan-mahasiswa', 'adminPanel@dataKesehatanMahasiswa');

        Route::group(['prefix' => 'pengguna', 'as' => 'pengguna.'], function () {
            Route::get('/', 'adminPanel@dataPengguna')->name('index');
			Route::get('ganti-password', 'adminPanel@dataPengguna')->name('ganti-password');
			Route::post('ganti-password', 'adminPanel@dataPengguna')->name('ganti-password');
        });

        // DIVISI HUMAS
        Route::group(['middleware' => ['admin.publikasi']], function () {
            Route::group(['prefix' => 'kategori', 'as' => 'kategori.'], function () {
                Route::get('/', 'adminPanel@dataKategori')->name('index');
                Route::get('add', 'adminPanel@tambahKategori')->name('add');
                Route::post('add', 'adminPanel@prosesTambahKategori');
                Route::get('{slug}/edit', 'adminPanel@editKategori')->name('edit');
                Route::put('{slug}/edit', 'adminPanel@prosesEditKategori');
            });

            Route::group(['prefix' => 'artikel', 'as' => 'artikel.'], function () {
                Route::get('/', 'adminPanel@dataKategori')->name('index');
                Route::get('add', 'adminPanel@tambahArtikel')->name('add');
                Route::post('add', 'adminPanel@prosesTambahArtikel');
                Route::get('{slug}/edit', 'adminPanel@editArtikel')->name('edit');
                Route::put('{slug}/edit', 'adminPanel@prosesEditArtikel');
            });

            Route::group(['prefix' => 'faq', 'as' => 'faq.'], function () {
                Route::get('/', 'adminPanel@dataFaq')->name('index');
                Route::get('add', 'adminPanel@tambahFaq')->name('add');
                Route::post('add', 'adminPanel@prosesTambahFaq');
                Route::get('{id}/edit', 'adminPanel@editFaq')->name('edit');
                Route::put('{id}/edit', 'adminPanel@prosesEditFaq');
            });
        });

        // DIVISI FULL ACCESS ['BPI', 'PIT', 'SQC']
        Route::group(['middleware' => ['admin.full']], function () {
            Route::get('/NilaiKKM', 'adminPanel@dataNilaiKKM');
            Route::get('/addNilaiKKM', 'adminPanel@tambahNilaiKKM');
            Route::post('/addNilaiKKM', 'adminPanel@prosesTambahNilaiKKM');
            Route::get('/editNilaiKKM', 'adminPanel@editNilaiKKM');
            Route::put('/editNilaiKKM', 'adminPanel@prosesEditNilaiKKM');
            Route::get('/addPengguna', 'adminPanel@tambahPengguna');
            Route::post('/addPengguna', 'adminPanel@prosesTambahPengguna');
            Route::get('/editPengguna', 'adminPanel@editPengguna');
            Route::put('/editPengguna', 'adminPanel@prosesEditPengguna');
            Route::get('/editBiodataMahasiswa', 'adminPanel@editBiodataMahasiswa');
            Route::put('/editBiodataMahasiswa', 'adminPanel@prosesEditBiodataMahasiswa');

            // TODO : PK2Controller
            Route::get('/pk2Absensi', 'adminPanel@dataPk2Absensi');
            Route::post('/pk2Absensi', 'adminPanel@importPk2Absensi');
            Route::get('/editPk2Absensi', 'adminPanel@editPk2Absensi');
            Route::put('/editPk2Absensi', 'adminPanel@prosesEditPk2Absensi');
            Route::get('/pk2Keaktifan', 'adminPanel@dataPk2Keaktifan');
            Route::post('/pk2Keaktifan', 'adminPanel@importPk2Keaktifan');
            Route::get('/editPk2Keaktifan', 'adminPanel@editPk2Keaktifan');
            Route::put('/editPk2Keaktifan', 'adminPanel@prosesEditPk2Keaktifan');
            Route::get('/pk2Tugas', 'adminPanel@dataPk2Tugas');
            Route::post('/pk2Tugas', 'adminPanel@importPk2Tugas');
            Route::get('/editPk2Tugas', 'adminPanel@editPk2Tugas');
            Route::put('/editPk2Tugas', 'adminPanel@prosesEditPk2Tugas');
            Route::get('/lihatEsaiPk2Tugas', 'adminPanel@lihatEsaiPk2tugas');
            Route::get('/pk2Pelanggaran', 'adminPanel@dataPk2Pelanggaran');
            Route::post('/pk2Pelanggaran', 'adminPanel@importPk2Pelanggaran');
            Route::get('/editPk2Pelanggaran', 'adminPanel@editPk2Pelanggaran');
            Route::put('/editPk2Pelanggaran', 'adminPanel@prosesEditPk2Pelanggaran');
            Route::get('/pk2Total', 'adminPanel@dataPk2Total');

            Route::get('/stAbsensi', 'adminPanel@dataStAbsensi');
            Route::post('/stAbsensi', 'adminPanel@importStAbsensi');
            Route::get('/editStAbsensi', 'adminPanel@editStAbsensi');
            Route::put('/editStAbsensi', 'adminPanel@prosesEditStAbsensi');
            Route::get('/stKeaktifan', 'adminPanel@dataStKeaktifan');
            Route::post('/stKeaktifan', 'adminPanel@importStKeaktifan');
            Route::get('/editStKeaktifan', 'adminPanel@editStKeaktifan');
            Route::put('/editStKeaktifan', 'adminPanel@prosesEditStKeaktifan');
            Route::get('/stTugas', 'adminPanel@dataStTugas');
            Route::post('/stTugas', 'adminPanel@importStTugas');
            Route::get('/stTugasDeepTalk', 'adminPanel@datastTugasDeepTalk');
            Route::post('/stTugasDeepTalk', 'adminPanel@importstTugasDeepTalk');
            Route::get('/stTugasFilkomTv', 'adminPanel@datastTugasFilkomTv');
            Route::post('/stTugasFilkomTv', 'adminPanel@importstTugasFilkomTv');
            Route::get('/editStTugas', 'adminPanel@editStTugas');
            Route::put('/editStTugas', 'adminPanel@prosesEditStTugas');
            Route::get('/stPelanggaran', 'adminPanel@dataStPelanggaran');
            Route::post('/stPelanggaran', 'adminPanel@importStPelanggaran');
            Route::get('/editStPelanggaran', 'adminPanel@editStPelanggaran');
            Route::put('/editStPelanggaran', 'adminPanel@prosesEditStPelanggaran');

            Route::get('/pkmAbsensi', 'adminPanel@dataPkmAbsensi');
            Route::post('/pkmAbsensi', 'adminPanel@importPkmAbsensi');
            Route::get('/editPkmAbsensi', 'adminPanel@editPkmAbsensi');
            Route::put('/editPkmAbsensi', 'adminPanel@proseseditPkmAbsensi');
            Route::get('/pkmKeaktifan', 'adminPanel@dataPkmKeaktifan');
            Route::post('/pkmKeaktifan', 'adminPanel@importPkmKeaktifan');
            Route::get('/editPkmKeaktifan', 'adminPanel@editPkmKeaktifan');
            Route::put('/editPkmKeaktifan', 'adminPanel@prosesEditPkmKeaktifan');
            Route::get('/pkmKelompok', 'adminPanel@dataPkmKelompok');
            Route::post('/pkmKelompok', 'adminPanel@importPkmKelompok');
            Route::get('/pkmTugas', 'adminPanel@dataPkmTugas');
            Route::post('/pkmTugas', 'adminPanel@importPkmTugas');
            Route::get('/editPkmTugas', 'adminPanel@editPkmTugas');
            Route::put('/editPkmTugas', 'adminPanel@proseseditPkmTugas');
            Route::get('/pkmTugasAbstraksi', 'adminPanel@dataPkmTugasAbstraksi');
            Route::post('/pkmTugasAbstraksi', 'adminPanel@importPkmTugasAbstraksi');
            Route::get('/lihatPkmTugasAbstraksi', 'adminPanel@editPkmTugasAbstraksi');
            Route::put('/lihatPkmTugasAbstraksi', 'adminPanel@prosesEditPkmTugasAbstraksi');
            Route::get('/pkmPelanggaran', 'adminPanel@dataPkmPelanggaran');
            Route::post('/pkmPelanggaran', 'adminPanel@importPkmPelanggaran');
            Route::get('/editPkmPelanggaran', 'adminPanel@editPkmPelanggaran');
            Route::put('/editPkmPelanggaran', 'adminPanel@prosesEditPkmPelanggaran');

            Route::get('/prodiFinal', 'adminPanel@dataProdiFinal');
            Route::post('/prodiFinal', 'adminPanel@importProdiFinal');
            Route::get('/editProdiFinal', 'adminPanel@editProdiFinal');
            Route::put('/editProdiFinal', 'adminPanel@prosesEditProdiFinal');
        });
    });
});
