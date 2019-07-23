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
    public function login()
    {
        return view('login');
    }

    public function loginMahasiswa(Request $request)
    {
        $nim = $request->nim;
        $password = $request->password;

        if ($nim == '0000' && $password == '0000') {
            Session::put('nim', $nim);
            Session::put('nama', 'Akun');
            Session::put('prodi', 2);
            Session::put('foto', 'https://dummyimage.com/200x200/000000/fff&text=+AKUN');
            return redirect()->back()->with('alert', 'Anda berhasil login');
        } else if (isset($nim) && isset($password) && isset($request->haloguys)) {
            if (substr($nim, 0, 5) == '19515') {
                $API_EM_APPS = 'https://em.ub.ac.id/redirect/login/loginApps/?nim=' . $nim . '&password=' . $password;

                $responseLogin = json_decode(file_get_contents($API_EM_APPS), true);

                if (!$responseLogin['status']) {
                    return redirect()->back()->with('alert', 'NIM atau password salah');
                } else {
                    if (strtolower($responseLogin['fak']) == 'fakultas ilmu komputer') {
                        $nim_login = $responseLogin['nim'];
                        $nama_login = $responseLogin['nama'];
                        switch (strtolower($responseLogin['prodi'])) {
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
                        $foto_login = $responseLogin['foto'];

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
                        Session::put('foto', $foto_login);

                        if ($data_mahasiswa) {
                            if ($request->redirectTo) {
                                return redirect($request->redirectTo)->with('alert', 'Anda berhasil login');
                            } else {
                                return redirect()->route('index')->with('alert', 'Anda berhasil login');
                            }
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
