<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Kategori;
use App\Mahasiswa;
use App\NilaiKKM;
use App\Pengguna;
use App\Penugasan;
use App\Pk2mAbsen;
use App\Pk2mKeaktifan;
use App\Pk2mPelanggaran;
use App\Pk2mRekapnilai;
use App\Pk2mTourAbsen;
use App\Pk2mTourKeaktifan;
use App\Pk2mTourPelanggaran;
use App\ProdiFinal;
use App\StartupAbsen;
use App\StartupKeaktifan;
use App\StartupPelanggaran;
use App\StartupRekapNilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Validator;

class AdminController extends Controller
{
    public function getLogin()
    {
        return view('login-admin');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $data = Pengguna::find($username);
        if ($data) {
            if (Hash::check($password, $data->password)) {
                Session::put('username', $data->username);
                Session::put('divisi', $data->divisi);
                Session::put('is_full_access', $data->is_full_access);

                if ($request->redirectTo) {
                    return redirect($request->redirectTo);
                } else {
                    return redirect()->route('panel.dashboard');
                }
            } else {
                return redirect()->back()->with('alert', 'Password salah!');
            }
        } else {
            return redirect()->back()->with('alert', 'Username tidak ditemukan');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('panel.login')->with('alert', 'Anda telah keluar');
    }

    public function getDashboard()
    {
        return view('panel-admin.isiDashboard');
    }

    //Pengguna
    public function getPengguna()
    {
        $penggunas = Pengguna::all();
        return view('panel-admin.dataPengguna', ['penggunas' => $penggunas]);
    }

    public function getTambahPengguna()
    {
        return view('panel-admin.tambahPengguna');
    }

    public function tambahPengguna(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:3|max:100',
            'password' => 'required|min:6|max:20',
            'divisi' => 'required|min:3|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data = new Pengguna();
            $data->username = $request->username;
            $data->password = Hash::make($request->password);
            $data->divisi = $request->divisi;
            $data->save();
            return redirect()->route('panel.pengguna.index')->with('alert', 'Berhasil mendaftar pengguna');
        }
    }

    public function hapusPengguna(Request $request, $username)
    {
        $dataPengguna = Pengguna::where('username', $username)->first();
        $dataPengguna->delete();
        if (Session::get('username') == $username) {
            Session::flush();
            return redirect()->route('panel.')->with('alert', 'Anda telah keluar');
        } else {
            return redirect()->back()->with('alert', 'Berhasil menghapus pengguna');
        }
    }

    public function getEditPengguna($username)
    {
        $dataPengguna = Pengguna::where('username', $username)->first();
        return view('panel-admin.editPengguna', ['dataPengguna' => $dataPengguna]);
    }

    public function editPengguna(Request $request, $username)
    {
        $dataPengguna = Pengguna::where('username', $username)->update(['password' => bcrypt($request->password)]);
        return redirect()->route('panel.pengguna.index')->with('alert', 'Berhasil mengedit pengguna');
    }

    public function editPenggunaFull(Request $request, $username)
    {
        $dataPenggunaDiv = Pengguna::where('username', $username)->first();
        $dataPengguna = Pengguna::where('username', $username)->update(['username' => $request->username, 'password' => bcrypt($request->password), 'divisi' => $request->divisi]);
        if (Session::get('username') == $dataPenggunaDiv->username) {
            Session::put('username', $request->username);
        }
        if (Session::get('divisi') == $dataPenggunaDiv->divisi) {
            Session::put('divisi', $request->divisi);
        }
        return redirect()->route('panel.pengguna.index')->with('alert', 'Berhasil mengedit pengguna');
    }

    //Mahasiswa
    public function getBioMahasiswa()
    {
        $mahasiswas = Mahasiswa::all();
        return view('daftar-Mahasiswa', ['mahasiswas' => $mahasiswas]);
    }

    public function getEditMahasiswa($nim)
    {
        $dataMahasiswa = Mahasiswa::where('nim', $nim)->first();
        return view('editMahasiswa', ['dataMahasiswa' => $dataMahasiswa]);
    }

    public function editMahasiswa(Request $request, $nim)
    {
        $dataMahasiswa = Mahasiswa::where('nim', $nim)->update(['kelompok' => $request->kelompok], ['cluster' => $request->cluster]);
        return redirect('/')->with('alert', 'Berhasil mengubah data mahasiswa');
    }

    //nilaikkm
    public function getNilaiKKM()
    {
        $nilaikkms = NilaiKKM::all();
        return view('panel-admin.dataNilaiKKM', ['nilaikkms' => $nilaikkms]);
    }

    public function getTambahNilaiKKM()
    {
        return view('panel-admin.tambahNilaiKKM');
    }

    public function tambahNilaiKKM(Request $request)
    {
        $data = new NilaiKKM();
        $data->kegiatan = $request->kegiatan;
        $data->nilai = $request->nilai;
        $data->save();
        return redirect()->route('panel.full.show-nilai-kkm')->with('alert', 'Berhasil menambah penilaian');
    }

    public function hapusNilaiKKM(Request $request, $id)
    {
        $dataNilai = NilaiKKM::where('id', $id)->first();
        $dataNilai->delete();
        return redirect()->back()->with('alert', 'Berhasil menghapus penilaian');
    }

    public function getEditNilaiKKM($id)
    {
        $dataNilai = NilaiKKM::where('id', $id)->first();
        return view('panel-admin.editNilaiKKM', ['dataNilai' => $dataNilai]);
    }

    public function editNilaiKKM(Request $request, $id)
    {
        $dataNilai = NilaiKKM::where('id', $id)->update(
            [
                'kegiatan' => $request->kegiatan,
                'nilai' => $request->nilai,
            ]
        );
        return redirect()->route('panel.full.show-nilai-kkm')->with('alert', 'Berhasil mengubah data nilai kkm');
    }

    //penugasan
    public function getPenugasan()
    {
        $penugasans = Penugasan::all();
        return view('penugasan', ['penugasans' => $penugasans]);
    }

    public function getTambahPenugasan()
    {
        return view('tambahPenugasan');
    }

    public function tambahPenugasan(Request $request)
    {
        $data = new Penugasan();
        $data->tugas = $request->tugas;
        $data->save();
        return redirect('/daftar-penugasan')->with('alert', 'Berhasil menambah penugasan');
    }

    public function hapusPenugasan(Request $request)
    {
        $dataPenugasan = Penugasan::where('id', $request->input('id'))->first();
        $dataPenugasan->delete();
        return redirect()->back()->with('alert', 'Berhasil menghapus penugasan');
    }

    public function getEditPenugasan($id)
    {
        $dataPenugasan = Penugasan::where('id', $id)->first();
        return view('editPenugasan', ['dataPenugasan' => $dataPenugasan]);
    }

    public function editPenugasan(Request $request, $id)
    {
        $dataPenugasan = Penugasan::where('id', $id)->update(['tugas' => $request->tugas]);
        return redirect('/daftar-penugasan')->with('alert', 'Berhasil mengubah data penugasan');
    }

    //kategori
    public function getKategori()
    {
        $kategoris = Kategori::all();
        return view('kategori', ['kategoris' => $kategoris]);
    }

    public function getTambahKategori()
    {
        return view('tambahKategori');
    }

    public function tambahKategori(Request $request)
    {
        $data = new Kategori();
        $data->jenis = $request->jenis;
        $data->save();
        return redirect('/daftar-kategori')->with('alert', 'Berhasil menambah kategori');
    }

    public function hapusKategori(Request $request)
    {
        $dataKategori = Kategori::where('id', $request->input('id'))->first();
        $dataKategori->delete();
        return redirect()->back()->with('alert', 'Berhasil menghapus kategori');
    }

    public function getEditKategori($id)
    {
        $dataKategori = Kategori::where('id', $id)->first();
        return view('editKategori', ['dataKategori' => $dataKategori]);
    }

    public function editKategori(Request $request, $id)
    {
        $dataKategori = Kategori::where('id', $id)->update(['jenis' => $request->jenis]);
        return redirect('/daftar-kategori')->with('alert', 'Berhasil mengubah data kategori');
    }

    //faq
    public function getFaq()
    {
        $faqs = Faq::all();
        return view('panel-admin.dataFaq', ['faqs' => $faqs]);
    }

    public function getTambahFaq()
    {
        return view('tambahFaq');
    }

    public function tambahFaq(Request $request)
    {
        $data = new Faq();
        $data->tanya = $request->tanya;
        $data->jawab = $request->jawab;
        $data->save();
        return redirect('/daftar-faq')->with('alert', 'Berhasil menambah faq');
    }

    public function hapusFaq(Request $request)
    {
        $dataFaq = Faq::where('id', $request->input('id'))->first();
        $dataFaq->delete();
        return redirect()->back()->with('alert', 'Berhasil menghapus faq');
    }

    public function getEditFaq($id)
    {
        $dataFaq = Faq::where('id', $id)->first();
        return view('panel-admin.editArtikel', ['dataFaq' => $dataFaq]);
    }

    public function editFaq(Request $request, $id)
    {
        $dataFaq = Faq::where('id', $id)->update(['tanya' => $request->tanya], ['jawab' => $request->jawab]);
        return redirect('/daftar-faq')->with('alert', 'Berhasil mengubah data faq');
    }

    //pk2maba absensi
    public function getPk2mabaAbsen()
    {
        $pk2mabaAbsens = Pk2mAbsen::all();
        return view('panel-admin.pk2absensi', ['pk2mabaAbsens' => $pk2mabaAbsens]);
    }

    public function getEditPk2mabaAbsen($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $pk2mabaAbsen = Pk2mAbsen::where('nim', $mahasiswa->nim)->first();
        return view('panel-admin.pk2EditAbsensi', ['mahasiswa' => $mahasiswa, 'pk2mabaAbsen' => $pk2mabaAbsen]);
    }

    public function editPk2mabaAbsen(Request $request, $nim)
    {
        $dataAbsen = Pk2mAbsen::where('nim', $nim)->update(['nilai_rangkaian1' => $request->nilai_rangkaian1, 'nilai_rangkaian2' => $request->nilai_rangkaian2]);
        return redirect()->route('panel.full.show-pk2-absensi')->with('alert', 'Berhasil mengubah data pk2maba Absensi');
    }

    public function hapusPk2mabaAbsen($nim)
    {
        $dataAbsen = Pk2mAbsen::where('nim', $nim)->first();
        $dataAbsen->delete();
        return redirect()->back()->with('alert', 'Berhasil menghapus data pk2maba Absensi');
    }

    //pk2maba keaktifan
    public function getPk2mabaKeaktifan()
    {
        $pk2mabaKeaktifans = Pk2mKeaktifan::all();
        return view('panel-admin.pk2Keaktifan', ['pk2mabaKeaktifans' => $pk2mabaKeaktifans]);
    }

    public function getEditPk2mabaKeaktifan($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $pk2mabaKeaktifan = Pk2mKeaktifan::where('nim', $mahasiswa->nim)->first();
        return view('panel-admin.pk2EditKeaktifan', ['mahasiswa' => $mahasiswa, 'pk2mabaKeaktifan' => $pk2mabaKeaktifan]);
    }

    public function editPk2mabaKeaktifan(Request $request, $nim)
    {
        $dataKeaktifan = Pk2mKeaktifan::where('nim', $nim)->update(
            ['aktif_rangkaian1' => $request->aktif_rangkaian1,
                'penerapan_nilai_rangkaian1' => $request->penerapan_nilai_rangkaian1,
                'aktif_rangkaian2' => $request->aktif_rangkaian2,
                'penerapan_nilai_rangkaian2' => $request->penerapan_nilai_rangkaian2]
        );
        return redirect()->route('panel.full.show-pk2-keaktifan')->with('alert', 'Berhasil mengubah data pk2maba Keaktifan');
    }

    public function hapusPk2mabaKeaktifan($nim)
    {
        $dataKeaktifan = Pk2mKeaktifan::where('nim', $nim)->first();
        $dataKeaktifan->delete();
        return redirect()->back()->with('alert', 'Berhasil menghapus data pk2maba Keaktifan');
    }

    //pk2maba pelanggaran
    public function getPk2mabaPelanggaran()
    {
        $pk2mabaPelanggarans = Pk2mPelanggaran::all();
        return view('panel-admin.pk2Pelanggaran', ['pk2mabaPelanggarans' => $pk2mabaPelanggarans]);
    }

    public function getEditPk2mabaPelanggaran($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $pk2mabaPelanggaran = Pk2mPelanggaran::where('nim', $mahasiswa->nim)->first();
        return view('panel-admin.pk2EditPelanggaran', ['mahasiswa' => $mahasiswa, 'pk2mabaPelanggaran' => $pk2mabaPelanggaran]);
    }

    public function editPk2mabaPelanggaran(Request $request, $nim)
    {
        $dataPelanggaran = Pk2mPelanggaran::where('nim', $nim)->update(
            ['ringan' => $request->ringan,
                'sedang' => $request->sedang,
                'berat' => $request->berat]
        );
        return redirect()->route('panel.full.show-pk2-pelanggaran')->with('alert', 'Berhasil mengubah data pk2maba Pelanggaran');
    }

    public function hapusPk2mabaPelanggaran($nim)
    {
        $dataPelanggaran = Pk2mPelanggaran::where('nim', $nim)->first();
        $dataPelanggaran->delete();
        return redirect()->back()->with('alert', 'Berhasil menghapus data pk2maba pelanggaran');
    }

    //pk2maba rekap nilai
    public function getPk2mabaRekapNilai()
    {
        $pk2mabaKeaktifans = Pk2mKeaktifan::all();
        $pk2mabaPelanggarans = Pk2mPelanggaran::all();
        $pk2mabaRekapNilais = Pk2mRekapNilai::all();
        $pk2mabaRekapNilai = array();
        for ($i = 0; $i < count($pk2mabaRekapNilais); $i++) {
            $pk2mabaRekapNilai[$i] = Pk2mRekapNilai::where('nim', $pk2mabaKeaktifans[$i]->nim)->where('nim', $pk2mabaPelanggarans[$i]->nim)->first();
            $pk2mabaRekapNilai[$i]->aktif_rangkaian1 = $pk2mabaKeaktifans[$i]->aktif_rangkaian1;
            $pk2mabaRekapNilai[$i]->penerapan_nilai_rangkaian1 = $pk2mabaKeaktifans[$i]->penerapan_nilai_rangkaian1;
            $pk2mabaRekapNilai[$i]->aktif_rangkaian2 = $pk2mabaKeaktifans[$i]->aktif_rangkaian2;
            $pk2mabaRekapNilai[$i]->penerapan_nilai_rangkaian2 = $pk2mabaKeaktifans[$i]->penerapan_nilai_rangkaian2;
            $pk2mabaRekapNilai[$i]->ringan = $pk2mabaPelanggarans[$i]->ringan;
            $pk2mabaRekapNilai[$i]->sedang = $pk2mabaPelanggarans[$i]->sedang;
            $pk2mabaRekapNilai[$i]->berat = $pk2mabaPelanggarans[$i]->berat;
        }
        $mahasiswas = array();
        for ($i = 0; $i < count($pk2mabaRekapNilai); $i++) {
            $mahasiswas[$i] = Mahasiswa::where('nim', $pk2mabaRekapNilai)->first();
        }
        return view('panel-admin.pk2Total', ['mahasiswas' => $mahasiswas, 'pk2mabaRekapNilai' => $pk2mabaRekapNilai]);
    }

    public function getEditPk2mabaRekapNilai($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $pk2mabaRekapNilai = Pk2mRekapNilai::where('nim', $mahasiswa->nim)->first();
        return view('editPk2mabaRekapNilai', ['mahasiswas' => $mahasiswa, 'pk2mabaRekapNilai' => $pk2mabaRekapNilai]);
    }

    public function editPk2mabaRekapNilai(Request $request, $nim)
    {
        $dataRekapNilai = Pk2mRekapNilai::where('nim', $nim)->update(
            ['aktif_rangkaian1' => $request->aktif_rangkaian1,
                'penerapan_nilai_rangkaian1' => $request->penerapan_nilai_rangkaian1,
                'aktif_rangkaian2' => $request->aktif_rangkaian2,
                'penerapan_nilai_rangkaian2' => $request->penerapan_nilai_rangkaian2,
                'ringan' => $request->ringan,
                'sedang' => $request->sedang,
                'berat' => $request->berat]
        );
        return redirect('/daftar-pk2mRekapNilai')->with('alert', 'Berhasil mengubah data pk2maba Rekap Nilai');
    }

    //startup absensi
    public function getStartupAbsen()
    {
        $startupAbsens = StartupAbsen::all();
        return view('panel-admin.stabsensi', ['startupAbsens' => $startupAbsens]);
    }

    public function getEditStartupAbsen($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $startupAbsen = StartupAbsen::where('nim', $mahasiswa->nim)->first();
        return view('panel-admin.stEditAbsensi', ['mahasiswa' => $mahasiswa, 'startupAbsen' => $startupAbsen]);
    }

    public function editStartupAbsen(Request $request, $nim)
    {
        $dataAbsen = StartupAbsen::where('nim', $nim)->update(
            ['nilai_rangkaian3' => $request->nilai_rangkaian3,
                'nilai_rangkaian4' => $request->nilai_rangkaian4,
                'nilai_rangkaian5' => $request->nilai_rangkaian5]
        );
        return redirect()->route('panel.full.show-stAbsensi')->with('alert', 'Berhasil mengubah data startup Absensi');
    }

    //startup keaktifan
    public function getStartupKeaktifan()
    {
        $startupKeaktifans = StartupKeaktifan::all();
        return view('panel-admin.stKeaktifan', ['startupKeaktifans' => $startupKeaktifans]);
    }

    public function getEditStartupKeaktifan($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $startupKeaktifan = StartupKeaktifan::where('nim', $mahasiswa->nim)->first();
        return view('panel-admin.stEditKeaktifan', ['mahasiswa' => $mahasiswa, 'startupKeaktifan' => $startupKeaktifan]);

    }

    public function editStartupKeaktifan(Request $request, $nim)
    {
        $dataKeaktifan = StartupKeaktifan::where('nim', $nim)->update(
            ['aktif_rangkaian3' => $request->aktif_rangkaian3,
                'penerapan_nilai_rangkaian3' => $request->penerapan_nilai_rangkaian3,
                'aktif_rangkaian4' => $request->aktif_rangkaian4,
                'penerapan_nilai_rangkaian4' => $request->penerapan_nilai_rangkaian4,
                'aktif_rangkaian5' => $request->aktif_rangkaian5,
                'penerapan_nilai_rangkaian5' => $request->penerapan_nilai_rangkaian5]
        );
        return redirect()->route('panel.full.show-stKeaktifan')->with('alert', 'Berhasil mengubah data startup Keaktifan');
    }

    //startup pelanggaran
    public function getStartupPelanggaran()
    {
        $startupPelanggarans = StartupPelanggaran::all();
        return view('startupPelanggarans', ['startupPelanggarans' => $startupPelanggarans]);
    }

    public function getEditStartupPelanggaran($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $startupPelanggaran = StartupPelanggaran::where('nim', $mahasiswa->nim)->first();
        return view('editStartupPelanggaran', ['mahasiswa' => $mahasiswa, 'startupPelanggaran' => $startupPelanggaran]);
    }

    public function editStartupPelanggaran(Request $request, $nim)
    {
        $dataPelanggaran = StartupPelanggaran::where('nim', $nim)->update(
            ['ringan' => $request->ringan,
                'sedang' => $request->sedang,
                'berat' => $request->berat]
        );
        return redirect('/daftar-startupPelanggaran')->with('alert', 'Berhasil mengubah data Startup Pelanggaran');
    }

    //startup rekap nilai
    public function getStartupRekapNilai()
    {
        $startupKeaktifans = StartupKeaktifan::all();
        $startupPelanggarans = StartupPelanggaran::all();
        $startupRekapNilais = StartupRekapNilai::all();
        $startupRekapNilai = array();
        for ($i = 0; $i < count($startupRekapNilais); $i++) {
            $startupRekapNilai[$i] = Pk2mRekapNilai::where('nim', $startupKeaktifans[$i]->nim)->where('nim', $startupPelanggarans[$i]->nim)->first();
            $startupRekapNilai[$i]->aktif_rangkaian3 = $startupKeaktifans[$i]->aktif_rangkaian3;
            $startupRekapNilai[$i]->penerapan_nilai_rangkaian3 = $startupKeaktifans[$i]->penerapan_nilai_rangkaian3;
            $startupRekapNilai[$i]->aktif_rangkaian4 = $startupKeaktifans[$i]->aktif_rangkaian4;
            $startupRekapNilai[$i]->penerapan_nilai_rangkaian4 = $startupKeaktifans[$i]->penerapan_nilai_rangkaian4;
            $startupRekapNilai[$i]->aktif_rangkaian5 = $startupKeaktifans[$i]->aktif_rangkaian5;
            $startupRekapNilai[$i]->penerapan_nilai_rangkaian5 = $startupKeaktifans[$i]->penerapan_nilai_rangkaian5;
        }
        return view('startupRekapNilai', ['startupRekapNilai' => $startupRekapNilai]);
    }

    public function getEditStartupRekapNilai($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $startupRekapNilai = StartupRekapNilai::where('nim', $mahasiswa->nim)->first();
        return view('editStartupRekapNilai', ['mahasiswa' => $mahasiswa, 'startupRekapNilai' => $startupRekapNilai]);
    }

    public function editStartupRekapNilai(Request $request, $nim)
    {
        $dataRekapNilai = StartupRekapNilai::where('nim', $nim)->update(
            ['aktif_rangkaian3' => $request->aktif_rangkaian3,
                'penerapan_nilai_rangkaian3' => $request->penerapan_nilai_rangkaian3,
                'aktif_rangkaian4' => $request->aktif_rangkaian4,
                'penerapan_nilai_rangkaian4' => $request->penerapan_nilai_rangkaian4,
                'aktif_rangkaian5' => $request->aktif_rangkaian5,
                'penerapan_nilai_rangkaian5' => $request->penerapan_nilai_rangkaian5]
        );

        return redirect('/daftar-startupRekapNilai')->with('alert', 'Berhasil mengubah data startup Rekap Nilai');
    }

    //pk2maba tour absensi
    public function getPk2mabaTourAbsen()
    {
        $pk2mabaTourAbsens = StartupAbsen::all();
        return view('pk2mabaTourAbsens', ['pk2mabaTourAbsens' => $pk2mabaTourAbsens]);
    }

    public function getEditPk2mabaTourAbsen($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $pk2mabaTourAbsen = Pk2mTourAbsen::where('nim', $mahasiswa->nim)->first();
        return view('editPk2mabaTourAbsen', ['mahasiswa' => $mahasiswa, 'pk2mabaTourAbsen' => $pk2mabaTourAbsen]);
    }

    public function editPk2mabaTourAbsen(Request $request, $nim)
    {
        $dataAbsen = Pk2mTourAbsen::where('nim', $nim)->update(
            ['nilai_rangkaian6' => $request->nilai_rangkaian6,
                'nilai_rangkaian7' => $request->nilai_rangkaian7,
                'nilai_rangkaian8' => $request->nilai_rangkaian8]
        );
        return redirect('/daftar-pk2mabaTourAbsen')->with('alert', 'Berhasil mengubah data pk2mabaTour Absensi');
    }

    //pk2mabaTour keaktifan
    public function getPk2mabaTourKeaktifan()
    {
        $pk2mabaTourKeaktifans = Pk2mTourKeaktifan::all();
        return view('pk2mabaTourKeaktifans', ['pk2mabaTourKeaktifans' => $pk2mabaTourKeaktifans]);
    }

    public function getEditPk2mabaTourKeaktifan($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $pk2mabaTourKeaktifan = Pk2mTourKeaktifan::where('nim', $mahasiswa->nim)->first();
        return view('editPk2mabaTourKeaktifan', ['mahasiswa' => $mahasiswa, 'pk2mabaTourKeaktifan' => $pk2mabaTourKeaktifan]);
    }

    public function editPk2mabaTourKeaktifan(Request $request, $nim)
    {
        $dataKeaktifan = Pk2mTourKeaktifan::where('nim', $nim)->update(
            ['aktif_rangkaian6' => $request->aktif_rangkaian6,
                'penerapan_nilai_rangkaian6' => $request->penerapan_nilai_rangkaian6,
                'aktif_rangkaian7' => $request->aktif_rangkaian7,
                'penerapan_nilai_rangkaian7' => $request->penerapan_nilai_rangkaian7,
                'aktif_rangkaian8' => $request->aktif_rangkaian8,
                'penerapan_nilai_rangkaian8' => $request->penerapan_nilai_rangkaian8]
        );
        return redirect('/daftar-pk2mabaTourKeaktifan')->with('alert', 'Berhasil mengubah data pk2mabaTour Keaktifan');
    }

    //pk2mabaTour pelanggaran
    public function getPk2mabaTourPelanggaran()
    {
        $pk2mabaTourPelanggarans = Pk2mTourPelanggaran::all();
        return view('pk2mabaTourPelanggarans', ['pk2mabaTourPelanggarans' => $pk2mabaTourPelanggarans]);
    }

    public function getEditPk2mabaTourPelanggaran($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $pk2mabaTourPelanggaran = Pk2mTourPelanggaran::where('nim', $mahasiswa->nim)->first();
        return view('editPk2mabaTourPelanggaran', ['mahasiswa' => $mahasiswa, 'pk2mabaTourPelanggaran' => $pk2mabaTourPelanggaran]);
    }

    public function editPk2mabaTourPelanggaran(Request $request, $nim)
    {
        $dataPelanggaran = Pk2mTourPelanggaran::where('nim', $nim)->update(
            ['ringan' => $request->ringan,
                'sedang' => $request->sedang,
                'berat' => $request->berat]
        );
        return redirect('/daftar-pk2mabaTourPelanggaran')->with('alert', 'Berhasil mengubah data pk2mabaTour Pelanggaran');
    }

    //prodi final
    public function getProdiFinal()
    {
        $prodiFinals = Pk2mTourPelanggaran::all();
        return view('panel-admin.prodiFinal', ['prodiFinals' => $prodiFinals]);
    }

    public function getEditProdiFinal($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $prodiFinal = ProdiFinal::where('nim', $mahasiswa->nim)->first();
        return view('panel-admin.editProdiFinal', ['mahasiswa' => $mahasiswa, 'prodiFinal' => $prodiFinal]);
    }

    public function editProdiFinal(Request $request, $nim)
    {
        $dataProdiFinal = ProdiFinal::where('nim', $nim)->update(
            ['nilaiFull' => $request->nilaiFull]
        );
        return redirect()->route('panel.full.show-prodi-final')->with('alert', 'Berhasil mengubah data pk2mabaTour Pelanggaran');
    }

    public function hapusProdiFinal(Request $request, $nim)
    {
        $dataNilai = ProdiFinal::where('nim', $nim)->first();
        $dataNilai->delete();
        return redirect()->back()->with('alert', 'Berhasil menghapus penilaian');
    }
}
