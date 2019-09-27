<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataDiriMahasiswaRequest;
use App\Mahasiswa;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function loginManual()
    {
        return view('login');
    }

    public function loginMahasiswa(Request $request)
    {
        $nim = $request->nim;
        $password = $request->password;

        if (isset($nim) && isset($password)) {
            if (substr($nim, 0, 5)) {
                $cl = new Client;
                $cr = $cl->request('GET', 'https://siam.ub.ac.id/');
                $form = $cr->selectButton('Masuk')->form();
                $cr = $cl->submit($form, array('username' => $nim, 'password' => $password));

                $cek = $cr->filter('small.error-code')->each(function ($result) {
                    return $result->text();
                });

                if (isset($cek[0])) {
                    return redirect()->back()->with('alert', 'NIM atau password salah');
                } else {
                    $data = $cr->filter('div[class="bio-info"] > div')->each(function ($result) {
                        return $result->text();
                    });

                    if (strtolower(trim(substr($data[2], 19))) == 'ilmu komputer') {
                        $nim_login = $data[0];
                        $nama_login = $data[1];
                        switch (strtolower(substr($data[4], 13))) {
                            case 'teknik informatika':
                                $prodi_login = 2;
                                break;
                            case 'teknik komputer':
                                $prodi_login = 3;
                                break;
                            case 'sistem informasi':
                                $prodi_login = 4;
                                break;
                            case 'teknologi informasi':
                                $prodi_login = 6;
                                break;
                            case 'pendidikan teknologi informasi':
                                $prodi_login = 7;
                                break;
                            default:
                                $prodi_login = 0;
                        }

                        // Cek sudah pernah isi data atau belum
                        $data_mahasiswa = Mahasiswa::where('nim', $nim)->exists();
                        if (!$data_mahasiswa) {
                            try {
                                DB::beginTransaction();

                                $mahasiswa = Mahasiswa::create([
                                    'nim' => $nim_login,
                                    'nama' => $nama_login,
                                    'prodi' => $prodi_login
                                ]);
                                \App\PK2MabaAbsensi::create(['nim' => $mahasiswa->nim]);
                                \App\PK2MabaKeaktifan::create(['nim' => $mahasiswa->nim]);
                                \App\PK2MabaPelanggaran::create(['nim' => $mahasiswa->nim]);
                                \App\PK2MTourAbsensi::create(['nim' => $mahasiswa->nim]);
                                \App\PK2MTourKeaktifan::create(['nim' => $mahasiswa->nim]);
                                \App\PK2MTourPelanggaran::create(['nim' => $mahasiswa->nim]);
                                \App\StartupAbsensi::create(['nim' => $mahasiswa->nim]);
                                \App\StartupKeaktifan::create(['nim' => $mahasiswa->nim]);
                                \App\StartupPelanggaran::create(['nim' => $mahasiswa->nim]);
                                \App\ProdiFinal::create(['nim' => $mahasiswa->nim]);

                                DB::commit();
                            } catch (Exception $e) {
                                DB::rollBack();

                                return redirect()->back()->with('alert', 'Login gagal');
                            }
                        }

                        Session::put('nim', $nim_login);
                        Session::put('nama', $nama_login);
                        Session::put('prodi', $prodi_login);

                        if ($data_mahasiswa) {
                            return redirect()->route('index')->with('alert', 'Anda berhasil login');
                        } else {
                            return redirect()->route('mahasiswa.data-diri')->with('alert', 'Silahkan isi data diri Anda');
                        }
                    } else {
                        return redirect()->back()->with('alert', 'Hanya untuk mahasiswa FILKOM');
                    }
                }
            } else {
                return redirect()->back()->with('alert', 'Hanya untuk angkatan 2019');
            }
        } else {
            return redirect()->back()->with('alert', 'Masukan tidak valid');
        }
    }

    public function getDataDiri()
    {
        $data_mahasiswa = Mahasiswa::where('nim', Session::get('nim'))->first();

        return view('v_mahasiswa/formDataDiri', compact('data_mahasiswa'));
    }

    public function storeDataDiri(DataDiriMahasiswaRequest $request)
    {
        $data_mahasiswa = Mahasiswa::where('nim', Session::get('nim'))->first();

        $data_mahasiswa->tempat_lahir = $request->tempat_lahir;
        $data_mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $data_mahasiswa->agama = $request->agama;
        $data_mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $data_mahasiswa->gol_darah = $request->gol_darah;
        $data_mahasiswa->riwayat_penyakit = $request->riwayat_penyakit;
        $data_mahasiswa->alergi_makanan = $request->alergi_makanan;
        $data_mahasiswa->alergi_obat = $request->alergi_obat;
        $data_mahasiswa->no_telepon = $request->no_telepon;

        $data_mahasiswa->save();
        return redirect()->route('index')->with('alert', 'Pengisian data diri berhasil');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('index')->with('alert', 'Anda telah keluar');
    }
}
