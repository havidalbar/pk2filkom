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

Route::post('/register', 'AdminController@tambahPengguna');
Route::get('/register', function () {
    return view('register');
});

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
            Route::get('/', 'AdminController@getPengguna')->name('index');
			Route::get('{username}/ganti-password', 'AdminController@getEditPengguna')->name('show-ganti-password');
            Route::post('{username}/ganti-password', 'AdminController@editPengguna')->name('ganti-password');
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
                Route::get('/', 'AdminController@getFaq')->name('index');
                Route::get('add', 'adminPanel@tambahFaq')->name('add');
                Route::post('add', 'adminPanel@prosesTambahFaq');
                Route::get('{id}/edit', 'AdminController@getEditFaq')->name('edit');
                Route::put('{id}/edit', 'adminPanel@prosesEditFaq');
            });
        });

        // DIVISI FULL ACCESS ['BPI', 'PIT', 'SQC']
        Route::group(['middleware' => ['admin.full'], 'prefix' =>'full' ,'as' =>'full.'], function () {
            Route::get('/NilaiKKM', 'AdminController@getNilaiKKM')->name('show-nilai-kkm');
            Route::get('/addNilaiKKM', 'AdminController@getTambahNilaiKKM')->name('show-add-nilai-kkm');
            Route::post('/addNilaiKKM', 'AdminController@tambahNilaiKKM')->name('add-nilai-kkm');
            Route::get('{id}/edit-nilaiKKM', 'AdminController@getEditNilaiKKM')->name('show-edit-nilai-kkm');
            Route::post('{id}/edit-nilaiKKM', 'AdminController@editNilaiKKM')->name('edit-nilai-kkm');
            Route::post('{id}/hapus-nilaiKKM', 'AdminController@hapusNilaiKKM')->name('hapus-nilai-kkm');

            Route::get('/addPengguna', 'AdminController@getTambahPengguna')->name('show-tambah-pengguna');
            Route::post('/addPengguna', 'AdminController@tambahPengguna')->name('tambah-pengguna');
            Route::get('{username}/edit-pengguna', 'AdminController@getEditPengguna')->name('show-edit-pengguna');
            Route::post('{username}/edit-pengguna', 'AdminController@editPenggunaFull')->name('edit-pengguna');
            Route::post('{username}/hapus-pengguna', 'AdminController@hapusPengguna')->name('hapus-pengguna');

            Route::get('/editBiodataMahasiswa', 'adminPanel@editBiodataMahasiswa');
            Route::put('/editBiodataMahasiswa', 'adminPanel@prosesEditBiodataMahasiswa');

            // TODO : PK2Controller
            Route::get('/pk2Absensi', 'AdminController@getPk2mabaAbsen')->name('show-pk2-absensi');
            Route::post('/pk2Absensi', 'adminPanel@importPk2Absensi');
            Route::get('{nim}/edit-Pk2Absensi', 'AdminController@getEditPk2mabaAbsensi')->name('show-edit-pk2-absensi');
            Route::post('{nim}/edit-Pk2Absensi', 'AdminController@editPk2mabamabaAbsen')->name('edit-pk2-absensi');
            Route::post('{nim}/hapus-Pk2Absensi', 'AdminController@hapusPk2mabaAbsen')->name('hapus-pk2-absensi');

            Route::get('/pk2Keaktifan', 'AdminController@getPk2mabaKeaktifan')->name('show-pk2-keaktifan');
            Route::post('/pk2Keaktifan', 'adminPanel@importPk2Keaktifan');
            Route::get('{nim}/edit-Pk2Keaktifan', 'AdminController@getEditPk2mabaKeaktifan')->name('show-edit-pk2-keaktifan');
            Route::post('{nim}/edit-Pk2Keaktifan', 'AdminController@editPk2mabaKeaktifan')->name('edit-pk2-keaktifan');
            Route::post('{nim}/hapus-Pk2Keaktifan', 'AdminController@hapusPk2mabaKeaktifan')->name('hapus-pk2-keaktifan');

            Route::get('/pk2Tugas', 'adminPanel@dataPk2Tugas');
            Route::post('/pk2Tugas', 'adminPanel@importPk2Tugas');
            Route::get('/editPk2Tugas', 'adminPanel@editPk2Tugas');
            Route::put('/editPk2Tugas', 'adminPanel@prosesEditPk2Tugas');
            Route::get('/lihatEsaiPk2Tugas', 'adminPanel@lihatEsaiPk2tugas');

            Route::get('/pk2Pelanggaran', 'AdminController@getPk2mabaPelanggaran')->name('show-pk2-pelanggaran');
            Route::post('/pk2Pelanggaran', 'adminPanel@importPk2Pelanggaran');
            Route::get('{nim}/edit-Pk2Pelanggaran', 'AdminController@getEditPk2mabaPelanggaran')->name('show-edit-pk2-pelanggaran');
            Route::post('{nim}/edit-Pk2Pelanggaran', 'AdminController@editPk2mabaPelanggaran')->name('edit-pk2-pelanggaran');
            Route::post('{nim}/hapus-Pk2Pelanggaran', 'AdminController@hapusPk2mabaPelanggaran')->name('hapus-pk2-pelanggaran');


            Route::get('/pk2Total', 'AdminController@getPk2mabaRekapNilai')->name('show-pk2-rekap');

            Route::get('/st-Absensi', 'AdminController@getStartupAbsen')->name('show-stAbsensi');
            Route::post('/stAbsensi', 'adminPanel@importStAbsensi');
            Route::get('{nim}/edit-StAbsensi', 'AdminController@getEditStartupAbsen')->name('show-edit-stAbsensi');
            Route::post('{nim}/edit-StAbsensi', 'AdminController@editStartupAbsen')->name('edit-stAbsensi');
            Route::post('{nim}/hapus-StAbsensi', 'AdminController@hapusStartupAbsen')->name('hapus-stAbsensi');

            Route::get('/st-Keaktifan', 'AdminController@getStartupKeaktifan')->name('show-stKeaktifan');
            Route::post('/stKeaktifan', 'adminPanel@importStKeaktifan');
            Route::get('{nim}/edit-StKeaktifan', 'AdminController@getEditStartupKeaktifan')->name('show-edit-stKeaktifan');
            Route::post('{nim}/editStKeaktifan', 'AdminController@editStartupKeaktifan')->name('edit-stKeaktifan');
            Route::post('{nim}/hapus-StKeaktifan', 'AdminController@hapusStartupKeaktifan')->name('hapus-stKeaktifan');

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

            Route::get('/prodiFinal', 'AdminController@dataProdiFinal')->name('show-prodi-final');
            Route::post('/prodiFinal', 'adminPanel@importProdiFinal');
            Route::get('{nim}/editProdiFinal', 'AdminController@getEditProdiFinal')->name('show-edit-prodi-final');
            Route::put('{nim}/editProdiFinal', 'AdminController@EditProdiFinal')->name('edit-prodi-final');
        });
    });
});
