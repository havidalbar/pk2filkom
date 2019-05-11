<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Pengguna;
use App\Mahasiswa;
use App\Rangkaian;
use App\Kegiatan;
use App\NilaiKKM;
use App\Penugasan;
use App\Kategori;
use App\Faq;
use App\Pk2mAbsen;
use App\Pk2mKeaktifan;
use App\Pk2mPelanggaran;
use App\Pk2mRekapnilai;
use App\StartupAbsen;
use App\StartupKeaktifan;
use App\StartupPelanggaran;
use App\StartupRekapNilai;
use App\Pk2mTourAbsen;
use App\Pk2mTourKeaktifan;
use App\Pk2mTourPelanggaran;


class AdminController extends Controller
{
    public function getLoginAdmin(){
        return view('loginAdmin');
    }
    public function loginAdmin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $data = Pengguna::where('username', $username)->first();
        echo $data;
        if (!($data == null)) {
            if ($password == $data->password) {
                Session::put('id', $data->id);
                Session::put('username', $data->username);
                Session::put('/', true);

                return redirect('/')->with('alert', 'Anda telah login');
            } else {
                return redirect()->back()->with('alert', 'Password salah!');
            }
        } else {
            return redirect()->back()->with('alert', 'Username atau Password salah!');
        }
    }

    public function logoutAdmin()
    {
        Session::flush();
        return redirect('/')->with('alert', 'Anda telah keluar');
    }

    //Pengguna
    public function getPengguna(){
        if(Session::has('username')) {
            $penggunas = Pengguna::all();
            return view('daftarPengguna', ['penggunas' => $penggunas]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getTambahPengguna(){
        if(Session::has('username')) {
            return view('tambahPengguna');
        }else{
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function tambahPengguna(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:3|max:100',
            'password' => 'required|min:6|max:20',
            'confirmation' => 'required|same:password',
            'divisi' => 'required|min:3|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
        $data = new Pengguna();
        $data->username = $request->username;
        $data->password = $request->password;
        $data->divisi = $request->divisi;
        $data->save();
        return redirect('/daftar-pengguna')->with('alert', 'Berhasil mendaftar pengguna');
        }
    }

    public function hapusPengguna(Request $request){
        $dataPengguna = Pengguna::where('id', $request->input('id'))->first();
        $dataPengguna->delete();
        return redirect()->back()->with('alert', 'Berhasil menghapus pengguna');
    }

    public function getEditPengguna($id){
        if(Session::has('username')) {
        $dataPengguna = Pengguna::where('id', $id)->first();
        return view('editPengguna', ['dataPengguna' => $dataPengguna]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editPengguna(Request $request,$id){
        $dataPengguna = Pengguna::where('id', $id)->update(['password'=> $request->password],['divisi' => $request->divisi]);
        return redirect('/daftar-pengguna')->with('alert', 'Berhasil mengubah data pengguna');
    }

    //Mahasiswa
    public function getBioMahasiswa(){
        if(Session::has('username')) {
            $mahasiswas = Mahasiswa::all();
            return view('daftar-Mahasiswa', ['mahasiswas' => $mahasiswas]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getEditMahasiswa($nim){
        if(Session::has('username')) {
        $dataMahasiswa = Mahasiswa::where('nim', $nim)->first();
        return view('editMahasiswa', ['dataMahasiswa' => $dataMahasiswa]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editMahasiswa(Request $request,$nim){
        $dataMahasiswa = Mahasiswa::where('nim', $nim)->update(['kelompok' => $request->kelompok],['cluster'=> $request->cluster]);
        return redirect('/')->with('alert', 'Berhasil mengubah data mahasiswa');
    }

    //Rangkaian
    public function getAgendaRangkaian(){
        if(Session::has('username')) {
            $rangkaians = Rangkaian::all();
            return view('agendaRangkaian', ['rangkaians' => $rangkaians]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getTambahRangkaian(){
        if(Session::has('username')) {
            return view('tambahRangkaian');
        }else{
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function tambahRangkaian(Request $request){
        $data = new Rangkaian();
        $data->waktu = $request->waktu;
        $data->rangkaian = $request->rangkaian;
        $data->save();
        return redirect('/daftar-rangkaian')->with('alert', 'Berhasil menambah rangkaian');
    }

    public function hapusRangkaian(Request $request){
        $dataRangkaian = Rangkaian::where('id', $request->input('id'))->first();
        $dataRangkaian->delete();
        return redirect()->back()->with('alert', 'Berhasil menghapus rangkaian');
    }

    public function getEditRangkaian($id){
        if(Session::has('username')) {
        $dataRangkaian = Rangkaian::where('id', $id)->first();
        return view('editRangkaian', ['dataRangkaian' => $dataRangkaian]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editRangkaian(Request $request,$id){
        $dataRangkaian = Rangkaian::where('id', $id)->update(['waktu'=> $request->waktu],['rangkaian' => $request->rangkaian]);
        return redirect('/daftar-rangkaian')->with('alert', 'Berhasil mengubah data rangkaian');
    }

    //Kegiatan
    public function getAgendaKegiatan(){
        if(Session::has('username')) {
            $kegiatans = Kegiatan::all();
            return view('agendaKegiatan', ['kegiatans' => $kegiatans]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getTambahKegiatan(){
        if(Session::has('username')) {
            return view('tambahKegiatan');
        }else{
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function tambahKegiatan(Request $request){
        $data = new Kegiatan();
        $data->waktu = $request->waktu;
        $data->kegiatan = $request->kegiatan;
        $data->keterangan = $request->keterangan;
        $data->deskripsi = $request->deskripsi;
        $data->save();
        return redirect('/daftar-kegiatan')->with('alert', 'Berhasil menambah kegiatan');
    }

    public function hapusKegiatan(Request $request){
        $dataKegiatan = Kegiatan::where('id', $request->input('id'))->first();
        $dataKegiatan->delete();
        return redirect()->back()->with('alert', 'Berhasil menghapus kegiatan');
    }

    public function getEditKegiatan($id){
        if(Session::has('username')) {
        $dataKegiatan = Kegiatan::where('id', $id)->first();
        return view('editKegiatan', ['dataKegiatan' => $dataKegiatan]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editKegiatan(Request $request,$id){
        $dataKegiatan = Kegiatan::where('id', $id)->update(['waktu' => $request->waktu],['kegiatan'=> $request->kegiatan],
        ['keterangan'=> $request->keterangan],['deskripsi'=> $request->deskripsi]);
        return redirect('/daftar-kegiatan')->with('alert', 'Berhasil mengubah data kegiatan');
    }

    //nilaikkm
    public function getNilaiKKM(){
        if(Session::has('username')) {
            $nilaikkms = NilaiKKM::all();
            return view('nilaiKKM', ['nilaikkms' => $nilaikkms]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getTambahNilaiKKM(){
        if(Session::has('username')) {
            return view('tambahNilai');
        }else{
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function tambahNilaiKKM(Request $request){
        $data = new NilaiKKM();
        $data->kegiatan = $request->kegiatan;
        $data->nilai = $request->nilai;
        $data->save();
        return redirect('/daftar-nilaiKKM')->with('alert', 'Berhasil menambah penilaian');
    }

    public function hapusNilaiKKM(Request $request){
        $dataNilai = NilaiKKM::where('id', $request->input('id'))->first();
        $dataNilai->delete();
        return redirect()->back()->with('alert', 'Berhasil menghapus penilaian');
    }

    public function getEditNilaiKKM($id){
        if(Session::has('username')) {
        $dataNilai = NilaiKKM::where('id', $id)->first();
        return view('editNilaiKKM', ['dataNilai' => $dataNilai]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editNilaiKKM(Request $request,$id){
        $dataNilai = NilaiKKM::where('id', $id)->update(['waktu' => $request->waktu],['rangkaian'=> $request->rangkaian],
        ['keterangan'=> $request->keterangan],['deskripsi'=> $request->deskripsi]);
        return redirect('/daftar-nilaiKKM')->with('alert', 'Berhasil mengubah data nilai kkm');
    }

    //penugasan
    public function getPenugasan(){
        if(Session::has('username')) {
            $penugasans = Penugasan::all();
            return view('penugasan', ['penugasans' => $penugasans]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getTambahPenugasan(){
        if(Session::has('username')) {
            return view('tambahPenugasan');
        }else{
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function tambahPenugasan(Request $request){
        $data = new Penugasan();
        $data->tugas = $request->tugas;
        $data->save();
        return redirect('/daftar-penugasan')->with('alert', 'Berhasil menambah penugasan');
    }

    public function hapusPenugasan(Request $request){
        $dataPenugasan = Penugasan::where('id', $request->input('id'))->first();
        $dataPenugasan->delete();
        return redirect()->back()->with('alert', 'Berhasil menghapus penugasan');
    }

    public function getEditPenugasan($id){
        if(Session::has('username')) {
        $dataPenugasan = Penugasan::where('id', $id)->first();
        return view('editPenugasan', ['dataPenugasan' => $dataPenugasan]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editPenugasan(Request $request,$id){
        $dataPenugasan = Penugasan::where('id', $id)->update(['tugas' => $request->tugas]);
        return redirect('/daftar-penugasan')->with('alert', 'Berhasil mengubah data penugasan');
    }

    //kategori
    public function getKategori(){
        if(Session::has('username')) {
            $kategoris = Kategori::all();
            return view('kategori', ['kategoris' => $kategoris]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getTambahKategori(){
        if(Session::has('username')) {
            return view('tambahKategori');
        }else{
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function tambahKategori(Request $request){
        $data = new Kategori();
        $data->jenis = $request->jenis;
        $data->save();
        return redirect('/daftar-kategori')->with('alert', 'Berhasil menambah kategori');
    }

    public function hapusKategori(Request $request){
        $dataKategori = Kategori::where('id', $request->input('id'))->first();
        $dataKategori->delete();
        return redirect()->back()->with('alert', 'Berhasil menghapus kategori');
    }

    public function getEditKategori($id){
        if(Session::has('username')) {
        $dataKategori = Kategori::where('id', $id)->first();
        return view('editKategori', ['dataKategori' => $dataKategori]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editKategori(Request $request,$id){
        $dataKategori = Kategori::where('id', $id)->update(['jenis' => $request->jenis]);
        return redirect('/daftar-kategori')->with('alert', 'Berhasil mengubah data kategori');
    }

    //faq
    public function getFaq(){
        if(Session::has('username')) {
            $faqs = Faq::all();
            return view('Faq', ['faqs' => $faqs]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getTambahFaq(){
        if(Session::has('username')) {
            return view('tambahFaq');
        }else{
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function tambahFaq(Request $request){
        $data = new Faq();
        $data->tanya = $request->tanya;
        $data->jawab = $request->jawab;
        $data->save();
        return redirect('/daftar-faq')->with('alert', 'Berhasil menambah faq');
    }

    public function hapusFaq(Request $request){
        $dataFaq = Faq::where('id', $request->input('id'))->first();
        $dataFaq->delete();
        return redirect()->back()->with('alert', 'Berhasil menghapus faq');
    }

    public function getEditFaq($id){
        if(Session::has('username')) {
        $dataFaq = Faq::where('id', $id)->first();
        return view('editFaq', ['dataFaq' => $dataFaq]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editFaq(Request $request,$id){
        $dataFaq = Faq::where('id', $id)->update(['tanya' => $request->tanya],['jawab' => $request->jawab]);
        return redirect('/daftar-faq')->with('alert', 'Berhasil mengubah data faq');
    }

    //pk2maba absensi
    public function getPk2mabaAbsen(){
        if(Session::has('username')) {
            $pk2mabaAbsens = Pk2mAbsen::all();
            return view('pk2mabaAbsens', ['pk2mabaAbsens' => $pk2mabaAbsens]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getEditPk2mabaAbsen($nim){
        if(Session::has('username')) {
        $mahasiswas = Mahasiswa::where('nim', $nim);
        $pk2mabaAbsen = array();
        for($i = 0; $i < count($mahasiswas); $i++) {
        $pk2mabaAbsen[$i] = Pk2mAbsen::where('nim', $mahasiswas[$i]->nim)->first();
        }
        return view('editPk2mabaAbsen', ['mahasiswas' => $mahasiswas,'pk2mabaAbsen' => $pk2mabaAbsen]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editPk2mabaAbsen(Request $request,$nim){
        $dataAbsen = Pk2mAbsen::where('nim', $nim)->update(['nilai_rangkaian1' => $request->nilai_rangkaian1],['nilai_rangkaian2' => $request->nilai_rangkaian2]);
        return redirect('/daftar-pk2mAbsen')->with('alert', 'Berhasil mengubah data pk2maba Absensi');
    }

    //pk2maba keaktifan
    public function getPk2mabaKeaktifan(){
        if(Session::has('username')) {
            $pk2mabaKeaktifans = Pk2mKeaktifan::all();
            return view('pk2mabaKeaktifans', ['pk2mabaKeaktifans' => $pk2mabaKeaktifans]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getEditPk2mabaKeaktifan($nim){
        if(Session::has('username')) {
        $mahasiswas = Mahasiswa::where('nim', $nim);
        $pk2mabaKeaktifan = array();
        for($i = 0; $i < count($mahasiswas); $i++) {
        $pk2mabaKeaktifan[$i] = Pk2mKeaktifan::where('nim', $mahasiswas[$i]->nim)->first();
        }
        return view('editPk2mabaKeaktifan', ['mahasiswas' => $mahasiswas,'pk2mabaKeaktifan' => $pk2mabaKeaktifan]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editPk2mabaKeaktifan(Request $request,$nim){
        $dataKeaktifan = Pk2mKeaktifan::where('nim', $nim)->update(['aktif_rangkaian1' => $request->aktif_rangkaian1],['penerapan_nilai_rangkaian1' => $request->penerapan_nilai_rangkaian1],
        ['aktif_rangkaian2' => $request->aktif_rangkaian2],['penerapan_nilai_rangkaian2' => $request->penerapan_nilai_rangkaian2]);
        return redirect('/daftar-pk2mKeaktifan')->with('alert', 'Berhasil mengubah data pk2maba Keaktifan');
    }

    //pk2maba pelanggaran
    public function getPk2mabaPelanggaran(){
        if(Session::has('username')) {
            $pk2mabaPelanggarans = Pk2mPelanggaran::all();
            return view('pk2mabaPelanggarans', ['pk2mabaPelanggarans' => $pk2mabaPelanggarans]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getEditPk2mabaPelanggaran($nim){
        if(Session::has('username')) {
        $mahasiswas = Mahasiswa::where('nim', $nim);
        $pk2mabaPelanggaran = array();
        for($i = 0; $i < count($mahasiswas); $i++) {
        $pk2mabaPelanggaran[$i] = Pk2mPelanggaran::where('nim', $mahasiswas[$i]->nim)->first();
        }
        return view('editPk2mabaPelanggaran', ['mahasiswas' => $mahasiswas,'pk2mabaPelanggaran' => $pk2mabaPelanggaran]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editPk2mabaPelanggaran(Request $request,$nim){
        $dataPelanggaran = Pk2mPelanggaran::where('nim', $nim)->update(['ringan' => $request->ringan],['sedang' => $request->sedang],
        ['berat' => $request->berat]);
        return redirect('/daftar-pk2mPelanggaran')->with('alert', 'Berhasil mengubah data pk2maba Pelanggaran');
    }

    //pk2maba rekap nilai
    public function getPk2mabaRekapNilai(){
        if(Session::has('username')) {
            $pk2mabaKeaktifans = Pk2mKeaktifan::all();
            $pk2mabaPelanggarans = Pk2mPelanggaran::all();
            $pk2mabaRekapNilais = Pk2mabaRekapNilai::all();
            $pk2mabaRekapNilai = array();
            for($i = 0; $i < count($pk2mabaRekapNilais); $i++) {
                $pk2mabaRekapNilai[$i] = Pk2mRekapNilai::where('nim', $pk2mabaKeaktifans[$i]->nim,'&nim', $pk2mabaPelanggarans[$i]->nim)->first();
                $pk2mabaRekapNilai[$i]->aktif_rangkaian1 = $pk2mabaKeaktifans[$i]->aktif_rangkaian1;
                $pk2mabaRekapNilai[$i]->penerapan_nilai_rangkaian1 = $pk2mabaKeaktifans[$i]->penerapan_nilai_rangkaian1;
                $pk2mabaRekapNilai[$i]->aktif_rangkaian2 = $pk2mabaKeaktifans[$i]->aktif_rangkaian2;
                $pk2mabaRekapNilai[$i]->penerapan_nilai_rangkaian2 = $pk2mabaKeaktifans[$i]->penerapan_nilai_rangkaian2;
                $pk2mabaRekapNilai[$i]->ringan = $pk2mabaPelanggarans[$i]->ringan;
                $pk2mabaRekapNilai[$i]->sedang = $pk2mabaPelanggarans[$i]->sedang;
                $pk2mabaRekapNilai[$i]->berat = $pk2mabaPelanggarans[$i]->berat;
                }
            return view('pk2mabaRekapNilai', ['pk2mabaRekapNilai' => $pk2mabaRekapNilai]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getEditPk2mabaRekapNilai($nim){
        if(Session::has('username')) {
        $mahasiswas = Mahasiswa::where('nim', $nim);
        $pk2mabaRekapNilai = array();
        for($i = 0; $i < count($mahasiswas); $i++) {
        $pk2mabaRekapNilai[$i] = Pk2mRekapNilai::where('nim', $mahasiswas[$i]->nim)->first();
        }
        return view('editPk2mabaRekapNilai', ['mahasiswas' => $mahasiswas,'pk2mabaRekapNilai' => $pk2mabaRekapNilai]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editPk2mabaRekapNilai(Request $request,$nim){
        $dataRekapNilai = Pk2mRekapNilai::where('nim', $nim)->update(['aktif_rangkaian1' => $request->aktif_rangkaian1],
        ['penerapan_nilai_rangkaian1' => $request->penerapan_nilai_rangkaian1],['aktif_rangkaian2' => $request->aktif_rangkaian2],
        ['penerapan_nilai_rangkaian2' => $request->penerapan_nilai_rangkaian2],['ringan' => $request->ringan],
        ['sedang' => $request->sedang],['berat' => $request->berat]);
        return redirect('/daftar-pk2mRekapNilai')->with('alert', 'Berhasil mengubah data pk2maba Rekap Nilai');
    }

    //startup absensi
    public function getStartupAbsen(){
        if(Session::has('username')) {
            $startupAbsens = StartupAbsen::all();
            return view('startupAbsens', ['startupAbsens' => $startupAbsens]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getEditStartupAbsen($nim){
        if(Session::has('username')) {
        $mahasiswas = Mahasiswa::where('nim', $nim);
        $startupAbsen = array();
        for($i = 0; $i < count($mahasiswas); $i++) {
        $startupAbsen[$i] = StartupAbsen::where('nim', $mahasiswas[$i]->nim)->first();
        }
        return view('editStartupAbsen', ['mahasiswas' => $mahasiswas,'startupAbsen' => $startupAbsen]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editStartupAbsen(Request $request,$nim){
        $dataAbsen = StartupAbsen::where('nim', $nim)->update(['nilai_rangkaian3' => $request->nilai_rangkaian3],
        ['nilai_rangkaian4' => $request->nilai_rangkaian4],['nilai_rangkaian5' => $request->nilai_rangkaian5]);
        return redirect('/daftar-startupAbsen')->with('alert', 'Berhasil mengubah data startup Absensi');
    }

    //startup keaktifan
    public function getStartupKeaktifan(){
        if(Session::has('username')) {
            $startupKeaktifans = StartupKeaktifan::all();
            return view('startupKeaktifans', ['startupKeaktifans' => $startupKeaktifans]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getEditStartupKeaktifan($nim){
        if(Session::has('username')) {
        $mahasiswas = Mahasiswa::where('nim', $nim);
        $startupKeaktifan = array();
        for($i = 0; $i < count($mahasiswas); $i++) {
        $startupKeaktifan[$i] = StartupKeaktifan::where('nim', $mahasiswas[$i]->nim)->first();
        }
        return view('editStartupKeaktifan', ['mahasiswas' => $mahasiswas,'startupKeaktifan' => $startupKeaktifan]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editStartupKeaktifan(Request $request,$nim){
        $dataKeaktifan = StartupKeaktifan::where('nim', $nim)->update(['aktif_rangkaian3' => $request->aktif_rangkaian3],
        ['penerapan_nilai_rangkaian3' => $request->penerapan_nilai_rangkaian3],['aktif_rangkaian4' => $request->aktif_rangkaian4],
        ['penerapan_nilai_rangkaian4' => $request->penerapan_nilai_rangkaian4],['aktif_rangkaian5' => $request->aktif_rangkaian5],
        ['penerapan_nilai_rangkaian5' => $request->penerapan_nilai_rangkaian5]);
        return redirect('/daftar-startupKeaktifan')->with('alert', 'Berhasil mengubah data startup Keaktifan');
    }

    //startup pelanggaran
    public function getStartupPelanggaran(){
        if(Session::has('username')) {
            $startupPelanggarans = StartupPelanggaran::all();
            return view('startupPelanggarans', ['startupPelanggarans' => $startupPelanggarans]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getEditStartupPelanggaran($nim){
        if(Session::has('username')) {
        $mahasiswas = Mahasiswa::where('nim', $nim);
        $startupPelanggaran = array();
        for($i = 0; $i < count($mahasiswas); $i++) {
        $startupPelanggaran[$i] = StartupPelanggaran::where('nim', $mahasiswas[$i]->nim)->first();
        }
        return view('editStartupPelanggaran', ['mahasiswas' => $mahasiswas,'startupPelanggaran' => $startupPelanggaran]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editStartupPelanggaran(Request $request,$nim){
        $dataPelanggaran = StartupPelanggaran::where('nim', $nim)->update(['ringan' => $request->ringan],['sedang' => $request->sedang],
        ['berat' => $request->berat]);
        return redirect('/daftar-startupPelanggaran')->with('alert', 'Berhasil mengubah data Startup Pelanggaran');
    }

    //startup rekap nilai
    public function getStartupRekapNilai(){
        if(Session::has('username')) {
            $startupKeaktifans = StartupKeaktifan::all();
            $startupPelanggarans = StartupPelanggaran::all();
            $startupRekapNilais = StartupRekapNilai::all();
            $startupRekapNilai = array();
            for($i = 0; $i < count($startupRekapNilais); $i++) {
                $startupRekapNilai[$i] = Pk2mRekapNilai::where('nim', $startupKeaktifans[$i]->nim,'&nim', $startupPelanggarans[$i]->nim)->first();
                $startupRekapNilai[$i]->aktif_rangkaian3 = $startupKeaktifans[$i]->aktif_rangkaian3;
                $startupRekapNilai[$i]->penerapan_nilai_rangkaian3 = $startupKeaktifans[$i]->penerapan_nilai_rangkaian3;
                $startupRekapNilai[$i]->aktif_rangkaian4 = $startupKeaktifans[$i]->aktif_rangkaian4;
                $startupRekapNilai[$i]->penerapan_nilai_rangkaian4 = $startupKeaktifans[$i]->penerapan_nilai_rangkaian4;
                $startupRekapNilai[$i]->aktif_rangkaian5 = $startupKeaktifans[$i]->aktif_rangkaian5;
                $startupRekapNilai[$i]->penerapan_nilai_rangkaian5 = $startupKeaktifans[$i]->penerapan_nilai_rangkaian5;

                }
            return view('startupRekapNilai', ['startupRekapNilai' => $startupRekapNilai]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getEditStartupRekapNilai($nim){
        if(Session::has('username')) {
        $mahasiswas = Mahasiswa::where('nim', $nim);
        $startupRekapNilai = array();
        for($i = 0; $i < count($mahasiswas); $i++) {
        $startupRekapNilai[$i] = StartupRekapNilai::where('nim', $mahasiswas[$i]->nim)->first();
        }
        return view('editStartupRekapNilai', ['mahasiswas' => $mahasiswas,'startupRekapNilai' => $startupRekapNilai]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editStartupRekapNilai(Request $request,$nim){
        $dataRekapNilai = StartupRekapNilai::where('nim', $nim)->update(['aktif_rangkaian3' => $request->aktif_rangkaian3],
        ['penerapan_nilai_rangkaian3' => $request->penerapan_nilai_rangkaian3],['aktif_rangkaian4' => $request->aktif_rangkaian4],
        ['penerapan_nilai_rangkaian4' => $request->penerapan_nilai_rangkaian4],['aktif_rangkaian5' => $request->aktif_rangkaian5],
        ['penerapan_nilai_rangkaian5' => $request->penerapan_nilai_rangkaian5]);

        return redirect('/daftar-startupRekapNilai')->with('alert', 'Berhasil mengubah data startup Rekap Nilai');
    }

    //pk2maba tour absensi
    public function getPk2mabaTourAbsen(){
        if(Session::has('username')) {
            $pk2mabaTourAbsens = StartupAbsen::all();
            return view('pk2mabaTourAbsens', ['pk2mabaTourAbsens' => $pk2mabaTourAbsens]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getEditPk2mabaTourAbsen($nim){
        if(Session::has('username')) {
        $mahasiswas = Mahasiswa::where('nim', $nim);
        $pk2mabaTourAbsen = array();
        for($i = 0; $i < count($mahasiswas); $i++) {
        $pk2mabaTourAbsen[$i] = Pk2mTourAbsen::where('nim', $mahasiswas[$i]->nim)->first();
        }
        return view('editPk2mabaTourAbsen', ['mahasiswas' => $mahasiswas,'pk2mabaTourAbsen' => $pk2mabaTourAbsen]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editPk2mabaTourAbsen(Request $request,$nim){
        $dataAbsen = Pk2mTourAbsen::where('nim', $nim)->update(['nilai_rangkaian6' => $request->nilai_rangkaian6],
        ['nilai_rangkaian7' => $request->nilai_rangkaian7],['nilai_rangkaian8' => $request->nilai_rangkaian8]);
        return redirect('/daftar-pk2mabaTourAbsen')->with('alert', 'Berhasil mengubah data pk2mabaTour Absensi');
    }

    //pk2mabaTour keaktifan
    public function getPk2mabaTourKeaktifan(){
        if(Session::has('username')) {
            $pk2mabaTourKeaktifans = Pk2mTourKeaktifan::all();
            return view('pk2mabaTourKeaktifans', ['pk2mabaTourKeaktifans' => $pk2mabaTourKeaktifans]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getEditPk2mabaTourKeaktifan($nim){
        if(Session::has('username')) {
        $mahasiswas = Mahasiswa::where('nim', $nim);
        $pk2mabaTourKeaktifan = array();
        for($i = 0; $i < count($mahasiswas); $i++) {
        $pk2mabaTourKeaktifan[$i] = Pk2mTourKeaktifan::where('nim', $mahasiswas[$i]->nim)->first();
        }
        return view('editPk2mabaTourKeaktifan', ['mahasiswas' => $mahasiswas,'pk2mabaTourKeaktifan' => $pk2mabaTourKeaktifan]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editPk2mabaTourKeaktifan(Request $request,$nim){
        $dataKeaktifan = Pk2mTourKeaktifan::where('nim', $nim)->update(['aktif_rangkaian6' => $request->aktif_rangkaian6],
        ['penerapan_nilai_rangkaian6' => $request->penerapan_nilai_rangkaian6],['aktif_rangkaian7' => $request->aktif_rangkaian7],
        ['penerapan_nilai_rangkaian7' => $request->penerapan_nilai_rangkaian7],['aktif_rangkaian8' => $request->aktif_rangkaian8],
        ['penerapan_nilai_rangkaian8' => $request->penerapan_nilai_rangkaian8]);
        return redirect('/daftar-pk2mabaTourKeaktifan')->with('alert', 'Berhasil mengubah data pk2mabaTour Keaktifan');
    }

    //pk2mabaTour pelanggaran
    public function getPk2mabaTourPelanggaran(){
        if(Session::has('username')) {
            $pk2mabaTourPelanggarans = Pk2mTourPelanggaran::all();
            return view('pk2mabaTourPelanggarans', ['pk2mabaTourPelanggarans' => $pk2mabaTourPelanggarans]);
        }else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getEditPk2mabaTourPelanggaran($nim){
        if(Session::has('username')) {
        $mahasiswas = Mahasiswa::where('nim', $nim);
        $pk2mabaTourPelanggaran = array();
        for($i = 0; $i < count($mahasiswas); $i++) {
        $pk2mabaTourPelanggaran[$i] = Pk2mTourPelanggaran::where('nim', $mahasiswas[$i]->nim)->first();
        }
        return view('editPk2mabaTourPelanggaran', ['mahasiswas' => $mahasiswas,'pk2mabaTourPelanggaran' => $pk2mabaTourPelanggaran]);
    }else {
        return redirect('/login')->with('alert', 'Kamu harus login dulu');
    }
    }

    public function editPk2mabaTourPelanggaran(Request $request,$nim){
        $dataPelanggaran = Pk2mTourPelanggaran::where('nim', $nim)->update(['ringan' => $request->ringan],['sedang' => $request->sedang],
        ['berat' => $request->berat]);
        return redirect('/daftar-pk2mabaTourPelanggaran')->with('alert', 'Berhasil mengubah data pk2mabaTour Pelanggaran');
    }
}
