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
})->name('index');
Route::get('faq', 'MahasiswaController@getFaq')->name('faq');
// Mahasiswa
Route::group(['as' => 'mahasiswa.'], function () {
    Route::group(['middleware' => ['mahasiswa.tologin']], function () {
        Route::get('login', 'AuthController@login')->name('login');
        Route::post('login', 'AuthController@loginMahasiswa');
    });

    Route::group(['middleware' => ['mahasiswa.loggedin']], function () {
        Route::get('data-diri', 'AuthController@getDataDiri')->name('data-diri');
        Route::post('data-diri', 'AuthController@storeDataDiri');

        Route::get('qr-code', 'MahasiswaController@getQRCodeAbsensiOpenHouse')->name('qr-code');
        Route::get('buku-panduan', 'MahasiswaController@getBukuPanduan')->name('buku-panduan');
        Route::group(['prefix' => 'penugasan', 'as' => 'penugasan.'], function () {
            Route::get('/', 'JawabanController@index')->name('index');
            Route::group(['prefix' => '{slug}'], function () {
                Route::get('/', 'JawabanController@getViewJawaban')->name('view-jawaban');
                Route::post('/', 'JawabanController@submitJawaban')->name('submit-jawaban');
                Route::post('{index}', 'JawabanController@submitJawaban')->name('submit-pilihan-ganda');
            });
        });
        Route::get('penugasan', 'MahasiswaController@getPenugasan')->name('penugasan');
        Route::get('nametag', 'MahasiswaController@getNametag')->name('nametag');
        Route::get('cerita-tentang-aku', 'MahasiswaController@getCeritaTentangAku')->name('cerita-tentang-aku');
        Route::get('logout', 'AuthController@logout')->name('logout');
    });
});

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
        Route::group(['prefix' => 'mahasiswa', 'as' => 'mahasiswa.'], function () {
            Route::get('/', function ($id) {
                return redirect()->route('panel.mahasiswa.biodata');
            })->name('index');
            Route::get('biodata', 'PanelMahasiswaController@getBiodata')->name('biodata');
            Route::get('kesehatan', 'PanelMahasiswaController@getKesehatan')->name('kesehatan');
        });

        Route::group(['prefix' => 'pengguna', 'as' => 'pengguna.'], function () {
            Route::get('/', 'AdminController@index')->name('index');
            Route::get('ganti-password', 'AdminController@getGantiPassword')->name('ganti-password');
            Route::post('ganti-password', 'AdminController@gantiPassword');
        });

        // DIVISI HUMAS
        Route::group(['middleware' => ['admin.publikasi']], function () {
            // UNUSED FUNCTION : [Fadhil]
            // Route::resource('kategori', 'KategoriController')->parameters([
            //     'kategori' => 'slug'
            // ])->except(['show']);

            Route::resource('artikel', 'ArtikelController')->parameters([
                'artikel' => 'slug',
            ])->except(['show']);

            Route::resource('faq', 'FaqController')->parameters([
                'faq' => 'id',
            ])->except(['show']);
        });

        // DIVISI FULL ACCESS ['BPI', 'PIT', 'SQC']
        Route::group(['middleware' => ['admin.full']], function () {
            Route::group(['prefix' => 'mahasiswa', 'as' => 'mahasiswa.'], function () {
                Route::get('biodata/{nim}/edit', 'PanelMahasiswaController@editBiodataByAdmin')->name('biodata.edit');
                Route::put('biodata/{nim}', 'PanelMahasiswaController@updateBiodataByAdmin')->name('biodata.update');
                // CLUSTER
                Route::resource('cluster', 'ClusterController')->parameters([
                    'cluster' => 'nama',
                ])->only(['store', 'update', 'destroy']);
            });

            Route::resource('nilai-kkm', 'NilaiKkmController')->parameters([
                'nilai-kkm' => 'id',
            ])->except(['show']);

            Route::resource('pengguna', 'AdminController')->parameters([
                'pengguna' => 'username',
            ])->except(['show', 'index']);

            Route::resource('penugasan', 'PenugasanController')->parameters([
                'penugasan' => 'slug',
            ])->except(['show']);

            Route::group(['prefix' => 'kegiatan', 'as' => 'kegiatan.'], function () {
                Route::group(['prefix' => 'pk2maba', 'as' => 'pk2maba.'], function () {
                    Route::get('total', 'AdminController@getPK2MabaTotal')->name('total');

                    Route::resource('absensi', 'PK2MabaAbsensiController')->parameters([
                        'absensi' => 'nim',
                    ])->except(['create', 'show']);

                    Route::resource('keaktifan', 'PK2MabaKeaktifanController')->parameters([
                        'keaktifan' => 'nim',
                    ])->except(['create', 'show']);

                    Route::resource('pelanggaran', 'PK2MabaPelanggaranController')->parameters([
                        'pelanggaran' => 'nim',
                    ])->except(['create', 'show']);

                    Route::resource('tugas', 'PK2MabaTugasController')->parameters([
                        'tugas' => 'nim',
                    ])->except(['create', 'destroy']);
                });

                Route::group(['prefix' => 'startup', 'as' => 'startup.'], function () {
                    Route::resource('absensi', 'StartupAbsensiController')->parameters([
                        'absensi' => 'nim',
                    ])->except(['create', 'show']);
                    // ABSENSI OPEN HOUSE
                    Route::get('absensi/open-house', 'StartupAbsensiController@absensiOpenHouse')->name('absensi.open-house');

                    Route::resource('keaktifan', 'StartupKeaktifanController')->parameters([
                        'keaktifan' => 'nim',
                    ])->except(['create', 'show']);

                    Route::resource('pelanggaran', 'StartupPelanggaranController')->parameters([
                        'pelanggaran' => 'nim',
                    ])->except(['create', 'show']);

                    Route::resource('tugas', 'StartupTugasController')->parameters([
                        'tugas' => 'nim',
                    ])->except(['create', 'show', 'destroy']);
                    Route::group(['prefix' => 'tugas', 'as' => 'tugas.'], function () {
                        Route::get('deep-talk', 'StartupTugasController@dataDeepTalk')->name('deep-talk');
                        Route::post('deep-talk', 'StartupTugasController@importDeepTalk')->name('import-deep-talk');
                        Route::get('filkom-tv', 'StartupTugasController@dataFilkomTv')->name('filkom-tv');
                        Route::post('filkom-tv', 'StartupTugasController@importFilkomTv')->name('import-filkom-tv');
                    });

                    Route::get('total', function () {
                        return view('panel-admin.startup.total');
                    })->name('total');
                });

                Route::group(['prefix' => 'pkm', 'as' => 'pkm.'], function () {
                    Route::resource('absensi', 'PK2MTourAbsensiController')->parameters([
                        'absensi' => 'nim',
                    ])->except(['create', 'show']);

                    Route::resource('keaktifan', 'PK2MTourKeaktifanController')->parameters([
                        'keaktifan' => 'nim',
                    ])->except(['create', 'show']);

                    Route::resource('pelanggaran', 'PK2MTourPelanggaranController')->parameters([
                        'pelanggaran' => 'nim',
                    ])->except(['create', 'show']);

                    Route::get('total', function () {
                        return view('panel-admin.pkm.total');
                    })->name('total');
                });

                Route::resource('prodi', 'ProdiFinalController')->parameters([
                    'prodi' => 'nim',
                ])->except(['create', 'show']);
            });
        });
    });
});

Route::get('/text', 'ImageController@call')->name('textOnImage');
