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

                    if (trim(substr($data[2], 19)) == 'Ilmu Komputer') {

                        $div_foto = $cr->filter('div[class="photo-id"]')->each(function ($result) {
                            return $result->attr('style');
                        });

                        preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $div_foto[0], $foto);

                        Session::put('nim', $data[0]);
                        Session::put('nama', $data[1]);
                        Session::put('jurusan', substr($data[3], 7));
                        Session::put('prodi', substr($data[4], 13));
                        // Session::put('foto', $foto[0][0]);

                        $cr = $cl->request('GET', 'https://siam.ub.ac.id/biodata.tampil.php');

                        $dataDiri = $cr->filter('tr[class="text"]')->each(function ($result) {
                            return trim(str_replace(["\n        ", "\n          "], "", $result->text()));
                        });

                        // Session::put('tempat_lahir', substr($dataDiri[1], 24));
                        // Session::put('tanggal_lahir', substr($dataDiri[2], 24));
                        // Session::put('jenis_kelamin', substr($dataDiri[3], 21));
                        // Session::put('agama', substr($dataDiri[5], 15));
                        // Session::put('golongan_darah', substr($dataDiri[6], 26));
                        // Session::put('nomor_telepon', substr($dataDiri[22], 30));

                        // $response = [
                        //     'data' => [
                        //         'nim' => $data[0],
                        //         'nama' => $data[1],
                        //         'fakultas' => substr($data[2], 19),
                        //         'jurusan' => substr($data[3], 7),
                        //         'prodi' => substr($data[4], 13),
                        //         'tempat_lahir' => substr($dataDiri[1], 24),
                        //         'tanggal_lahir' => substr($dataDiri[2], 24),
                        //         'jenis_kelamin' => substr($dataDiri[3], 21),
                        //         'agama' => substr($dataDiri[5], 15),
                        //         'golongan_darah' => substr($dataDiri[6], 26),
                        //         'nomor_telepon' => substr($dataDiri[22], 30),
                        //         'foto' => $foto[0][0],
                        //     ],
                        // ];
                        // return response()->json($response, 200);

                        // Cek sudah pernah isi data atau belum
                        $data_mahasiswa = Mahasiswa::where('nim', Session::get('nim'))->first();
                        if ($data_mahasiswa) {
                            return redirect()->route('index')->with('alert', 'Anda berhasil login');
                        } else {
                            try {
                                DB::beginTransaction();

                                $mahasiswa = Mahasiswa::create([
                                    'nim' => $data[0],
                                    'nama' => $data[1],
                                ]);
                                // \App\PK2MabaAbsensi::create(['nim' => $mahasiswa->nim]);
                                // \App\PK2MabaKeaktifan::create(['nim' => $mahasiswa->nim]);
                                // \App\PK2MabaPelanggaran::create(['nim' => $mahasiswa->nim]);
                                // \App\PK2MTourAbsensi::create(['nim' => $mahasiswa->nim]);
                                // \App\PK2MTourKeaktifan::create(['nim' => $mahasiswa->nim]);
                                // \App\PK2MTourPelanggaran::create(['nim' => $mahasiswa->nim]);
                                // \App\StartupAbsensi::create(['nim' => $mahasiswa->nim]);
                                // \App\StartupKeaktifan::create(['nim' => $mahasiswa->nim]);
                                // \App\StartupPelanggaran::create(['nim' => $mahasiswa->nim]);
                                // \App\ProdiFinal::create(['nim' => $mahasiswa->nim]);

                                DB::commit();

                                return redirect()->route('mahasiswa.data-diri')->with('alert', 'Silahkan isi data diri Anda');
                            } catch (Exception $e) {
                                DB::rollBack();
                                Session::flush();

                                return redirect()->back()->with('alert', 'Login gagal');
                            }
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

    // public function loginMahasiswa(Request $request)
    // {
    //     $API_EM = 'https://em.ub.ac.id/auth/css/api.php?nim=nim_mahasiswa&pass=pass_mahasiswa';
    //     $API_EM_APPS = 'https://em.ub.ac.id/redirect/login/loginApps/?nim=nim_mahasiswa&password=pass_mahasiswa';

    //     $nim = $request->nim;
    //     $password = $request->password;
    //     $responseLogin = json_decode(
    //         file_get_contents(str_replace('nim_mahasiswa', $nim, str_replace('pass_mahasiswa', $password, $API_EM))
    //         ), true);

    //     if (substr($nim, 0, 5)) {
    //         if ($nim && $password && $responseLogin['sukses']) {
    //             $responseLoginEMApps = json_decode(
    //                 file_get_contents(str_replace('nim_mahasiswa', $nim, str_replace('pass_mahasiswa', $password, $API_EM_APPS))
    //                 ), true);

    //             // Membuat session
    //             Session::put('nim', $responseLogin['nim']);
    //             Session::put('nama', $responseLogin['nama']);
    //             Session::put('jurusan', $responseLogin['jurusan']);
    //             Session::put('prodi', $responseLogin['prodi']);
    //             Session::put('foto', $responseLoginEMApps['foto']);

    //             // Cek sudah pernah isi data atau belum
    //             $data_mahasiswa = Mahasiswa::where('nim', Session::get('nim'))->first();
    //             if ($data_mahasiswa) {
    //                 return redirect('/')->with('alert', 'Anda berhasil login');
    //             } else {
    //                 return redirect('/isi-biodata');
    //             }
    //         } else {
    //             return redirect('/')->with('alert', 'NIM atau password salah!');
    //         }
    //     } else {
    //         return redirect('/')->with('alert', 'Hanya untuk angkatan 2019');
    //     }
    // }

    public function getDataDiri()
    {
        $data_mahasiswa = Mahasiswa::where('nim', Session::get('nim'))->first();

        return view('v_mahasiswa/formDataDiri', compact('data_mahasiswa'));
    }

    public function storeDataDiri(DataDiriMahasiswaRequest $request)
    {
        $data_mahasiswa = Mahasiswa::where('nim', Session::get('nim'))->first();

        $data_mahasiswa->tempat_lahir = $request->tempat_lahir;
        $tanggal_lahir_array = explode('/', $request->tanggal_lahir);
        krsort($tanggal_lahir_array);
        $data_mahasiswa->tanggal_lahir = implode('-', $tanggal_lahir_array);
        $data_mahasiswa->agama = $request->agama;
        $data_mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $data_mahasiswa->gol_darah = $request->gol_darah;
        $data_mahasiswa->riwayat_penyakit = $request->riwayat_penyakit;
        $data_mahasiswa->alergi_makanan = $request->alergi_makanan;
        $data_mahasiswa->alergi_obat = $request->alergi_obat;
        $data_mahasiswa->no_telepon = $request->no_telepon;

        $data_mahasiswa->save();
        return redirect()->back()->with('alert', 'Pengisian data diri berhasil');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('index')->with('alert', 'Anda telah keluar');
    }
}
