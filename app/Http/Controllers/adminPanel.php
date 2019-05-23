<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminPanel extends Controller
{
    public function login()
    {
        return view('login-admin');
    }
    public function dashboardAdmin(Request $request)
    {
        $this->validate($request, [
            'username'  =>  'required|max:255|min:3',
            'password'  =>  'required',
        ]);
        $username = $request->username;
        $password = $request->password;

        if (isset($username) && isset($password)) {
            return redirect('/dashboard');
        }else{
            return redirect()->back();
        }
    }
    public function dashboar()
    {
        return view('panel-admin.isiDashboard');
    }
    public function dataKategori()
    {
        return view('panel-admin.dataKategori');
    }
    public function tambahKategori()
    {
        return view('panel-admin.tambahKategori');
    }
    public function prosesTambahKategori(Request $request)
    {
        $this->validate($request, [
            'kategori'  =>  'required|max:255|min:3'
        ]);
        $kategori = $request->kategori;

        if (isset($kategori)) {
            return redirect('/kategori');
        }else{
            return redirect()->back();
        }
    }
    public function editKategori()
    {
        return view('panel-admin.editKategori');
    }
    public function prosesEditKategori(Request $request)
    {
        $this->validate($request, [
            'kategori'  =>  'required|max:255|min:3'
        ]);
        $kategori = $request->kategori;

        if (isset($kategori)) {
            return redirect('/kategori');
        }else{
            return redirect()->back();
        }
    }
    public function dataArtikel()
    {
        return view('panel-admin.dataArtikel');
    }
    public function tambahArtikel()
    {
        return view('panel-admin.tambahArtikel');
    }
    public function prosesTambahArtikel(Request $request)
    {
        $this->validate($request, [
            'artikel'  =>  'required|max:255|min:3'
        ]);
        $artikel = $request->artikel;

        if (isset($artikel)) {
            return redirect('/artikel');
        }else{
            return redirect()->back();
        }
    }
    public function editArtikel()
    {
        return view('panel-admin.editArtikel');
    }
    public function prosesEditArtikel(Request $request)
    {
        $this->validate($request, [
            'artikel'  =>  'required|max:255|min:3'
        ]);
        $artikel = $request->artikel;

        if (isset($artikel)) {
            return redirect('/artikel');
        }else{
            return redirect()->back();
        }
    }
    public function dataFaq()
    {
        return view('panel-admin.dataFaq');
    }
    public function tambahFaq()
    {
        return view('panel-admin.tambahFaq');
    }
    public function prosesTambahFaq(Request $request)
    {
        $this->validate($request, [
            'pertanyaan'  =>  'required|max:255|min:3',
            'jawaban'  =>  'required|max:255|min:3'
        ]);
        $Faq = $request->Faq;

        if (isset($Faq)) {
            return redirect('/Faq');
        }else{
            return redirect()->back();
        }
    }
    public function editFaq()
    {
        return view('panel-admin.editFaq');
    }
    public function prosesEditFaq(Request $request)
    {
        $this->validate($request, [
            'pertanyaan'  =>  'required|max:255|min:3',
            'jawaban'  =>  'required|max:255|min:3'
        ]);
        $Faq = $request->Faq;

        if (isset($Faq)) {
            return redirect('/Faq');
        }else{
            return redirect()->back();
        }
    }    
    public function dataNilaiKKM()
    {
        return view('panel-admin.dataNilaiKKM');
    }
    public function tambahNilaiKKM()
    {
        return view('panel-admin.tambahNilaiKKM');
    }
    public function prosesTambahNilaiKKM(Request $request)
    {
        $this->validate($request, [
            'kegiatan'  =>  'required|max:255|min:3',
            'nilai'  =>  'required|max:255|min:3'
        ]);
        $NilaiKKM = $request->NilaiKKM;

        if (isset($NilaiKKM)) {
            return redirect('/NilaiKKM');
        }else{
            return redirect()->back();
        }
    }
    public function editNilaiKKM()
    {
        return view('panel-admin.editNilaiKKM');
    }
    public function prosesEditNilaiKKM(Request $request)
    {
        $this->validate($request, [
            'kegiatan'  =>  'required|max:255|min:3',
            'nilai'  =>  'required|max:255|min:3'
        ]);
        $NilaiKKM = $request->NilaiKKM;

        if (isset($NilaiKKM)) {
            return redirect('/NilaiKKM');
        }else{
            return redirect()->back();
        }
    }
    public function dataPengguna()
    {
        return view('panel-admin.dataPengguna');
    }
    public function tambahPengguna()
    {
        return view('panel-admin.tambahPengguna');
    }
    public function prosesTambahPengguna(Request $request)
    {
        $this->validate($request, [
            'pengguna'  =>  'required|max:255|min:3',
            'password'  =>  'required|max:255|min:3'
        ]);
        $Pengguna = $request->Pengguna;

        if (isset($Pengguna)) {
            return redirect('/Pengguna');
        }else{
            return redirect()->back();
        }
    }
    public function editPengguna()
    {
        return view('panel-admin.editPengguna');
    }
    public function prosesEditPengguna(Request $request)
    {
        $this->validate($request, [
            'pengguna'  =>  'required|max:255|min:3',
            'password'  =>  'required|max:255|min:3'
        ]);
        $Pengguna = $request->Pengguna;

        if (isset($Pengguna)) {
            return redirect('/Pengguna');
        }else{
            return redirect()->back();
        }
    }
    public function dataBiodataMahasiswa()
    {
        return view('panel-admin.dataBiodataMahasiswa');
    }
    public function editBiodataMahasiswa()
    {
        return view('panel-admin.editBiodataMahasiswa');
    }
    public function prosesEditBiodataMahasiswa(Request $request)
    {
        $this->validate($request, [
            'nim'  =>  'required|max:255|min:3',
            'kelompok'  =>  'required|max:255|min:3',
            'cluster'  =>  'required|max:255|min:3'
        ]);
        $BiodataMahasiswa = $request->nim;

        if (isset($BiodataMahasiswa)) {
            return redirect('/biodataMahasiswa');
        }else{
            return redirect()->back();
        }
    }
    public function dataKesehatanMahasiswa()
    {
        return view('panel-admin.dataKesehatanMahasiswa');
    }
    public function dataPk2absensi()
    {
        return view('panel-admin.pk2absensi');
    }
    public function importPk2Absensi(Request $request)
    {
        $this->validate($request, [
            'absensi'  =>  'required'
        ]);
        $absensi = $request->absensi;

        if (isset($absensi)) {
            return redirect('/pk2Absensi');
        }else{
            return redirect()->back();
        }
    }
    public function editPk2Absensi()
    {
        return view('panel-admin.pk2EditAbsensi');
    }
    public function prosesEditPk2Absensi(Request $request)
    {
        $this->validate($request, [
            'nim'  =>  'required',
            'nilaiR1'  =>  'required',
            'nilaiR2'  =>  'required'
        ]);
        $nim = $request->nim;

        if (isset($nim)) {
            return redirect('/pk2Absensi');
        }else{
            return redirect()->back();
        }
    }
    public function dataPk2Keaktifan()
    {
        return view('panel-admin.pk2Keaktifan');
    }
    public function importPk2Keaktifan(Request $request)
    {
        $this->validate($request, [
            'keatifan'  =>  'required'
        ]);
        $keatifan = $request->keatifan;

        if (isset($keatifan)) {
            return redirect('/pk2Keaktifan');
        }else{
            return redirect()->back();
        }
    }
    public function editPk2Keaktifan()
    {
        return view('panel-admin.pk2EditKeaktifan');
    }
    public function prosesEditPk2Keaktifan(Request $request)
    {
        $this->validate($request, [
            'nim'  =>  'required',
            'nilaik1'  =>  'required',
            'nilaip1'  =>  'required',
            'nilaik2'  =>  'required',
            'nilaip2'  =>  'required'
        ]);
        $nim = $request->nim;

        if (isset($nim)) {
            return redirect('/pk2Keaktifan');
        }else{
            return redirect()->back();
        }
    }
    public function dataPk2Tugas()
    {
        return view('panel-admin.pk2Esai');
    }
    public function importPk2Tugas(Request $request)
    {
        $this->validate($request, [
            'esai'  =>  'required'
        ]);
        $esai = $request->esai;

        if (isset($esai)) {
            return redirect('/pk2Tugas');
        }else{
            return redirect()->back();
        }
    }
    public function editPk2Tugas()
    {
        return view('panel-admin.pk2EditEsai');
    }
    public function prosesEditPk2Tugas(Request $request)
    {
        $this->validate($request, [
            'nilaiesai'  =>  'required'
        ]);
        $nilaiesai = $request->nilaiesai;

        if (isset($nilaiesai)) {
            return redirect('/pk2Tugas');
        }else{
            return redirect()->back();
        }
    }
    public function lihatEsaiPk2tugas()
    {
        return view('panel-admin.pk2LihatEsai');
    }
    public function dataPk2Pelanggaran()
    {
        return view('panel-admin.pk2Pelanggaran');
    }
    public function importPk2Pelanggaran(Request $request)
    {
        $this->validate($request, [
            'pelanggaran'  =>  'required'
        ]);
        $pelanggaran = $request->pelanggaran;

        if (isset($pelanggaran)) {
            return redirect('/pk2Pelanggaran');
        }else{
            return redirect()->back();
        }
    }
    public function editPk2Pelanggaran()
    {
        return view('panel-admin.pk2EditPelanggaran');
    }
    public function prosesEditPk2Pelanggaran(Request $request)
    {
        $this->validate($request, [
            'nim'  =>  'required',
            'ringan'  =>  'required',
            'sedang'  =>  'required',
            'berat'  =>  'required'
        ]);
        $nim = $request->nim;

        if (isset($nim)) {
            return redirect('/pk2Pelanggaran');
        }else{
            return redirect()->back();
        }
    }
    public function dataPk2Total()
    {
        return view('panel-admin.pk2Total');
    }
    public function dataStabsensi()
    {
        return view('panel-admin.stabsensi');
    }
    public function importStAbsensi(Request $request)
    {
        $this->validate($request, [
            'absensi'  =>  'required'
        ]);
        $absensi = $request->absensi;

        if (isset($absensi)) {
            return redirect('/stAbsensi');
        }else{
            return redirect()->back();
        }
    }
    public function editStAbsensi()
    {
        return view('panel-admin.stEditAbsensi');
    }
    public function prosesEditStAbsensi(Request $request)
    {
        $this->validate($request, [
            'nim'  =>  'required',
            'nilaiR3'  =>  'required',
            'nilaiR4'  =>  'required',
            'nilaiR5'  =>  'required'
        ]);
        $nim = $request->nim;

        if (isset($nim)) {
            return redirect('/stAbsensi');
        }else{
            return redirect()->back();
        }
    }
    public function dataStKeaktifan()
    {
        return view('panel-admin.stKeaktifan');
    }
    public function importStKeaktifan(Request $request)
    {
        $this->validate($request, [
            'keatifan'  =>  'required'
        ]);
        $keatifan = $request->keatifan;

        if (isset($keatifan)) {
            return redirect('/stKeaktifan');
        }else{
            return redirect()->back();
        }
    }
    public function editStKeaktifan()
    {
        return view('panel-admin.stEditKeaktifan');
    }
    public function prosesEditStKeaktifan(Request $request)
    {
        $this->validate($request, [
            'nim'  =>  'required',
            'nilaik3'  =>  'required',
            'nilaip3'  =>  'required',
            'nilaik4'  =>  'required',
            'nilaip4'  =>  'required',
            'nilaik5'  =>  'required',
            'nilaip5'  =>  'required'
        ]);
        $nim = $request->nim;

        if (isset($nim)) {
            return redirect('/stKeaktifan');
        }else{
            return redirect()->back();
        }
    }
    public function dataStPelanggaran()
    {
        return view('panel-admin.stPelanggaran');
    }
    public function importStPelanggaran(Request $request)
    {
        $this->validate($request, [
            'pelanggaran'  =>  'required'
        ]);
        $pelanggaran = $request->pelanggaran;

        if (isset($pelanggaran)) {
            return redirect('/stPelanggaran');
        }else{
            return redirect()->back();
        }
    }
    public function editStPelanggaran()
    {
        return view('panel-admin.stEditPelanggaran');
    }
    public function prosesEditStPelanggaran(Request $request)
    {
        $this->validate($request, [
            'nim'  =>  'required',
            'ringan'  =>  'required',
            'sedang'  =>  'required',
            'berat'  =>  'required'
        ]);
        $nim = $request->nim;

        if (isset($nim)) {
            return redirect('/stPelanggaran');
        }else{
            return redirect()->back();
        }
    }
    public function dataStTugas()
    {
        return view('panel-admin.stTugas');
    }
    public function importStTugas(Request $request)
    {
        $this->validate($request, [
            'Tugas'  =>  'required'
        ]);
        $Tugas = $request->Tugas;

        if (isset($Tugas)) {
            return redirect('/stTugas');
        }else{
            return redirect()->back();
        }
    }
    public function editStTugas()
    {
        return view('panel-admin.stEditTugas');
    }
    public function prosesEditStTugas(Request $request)
    {
        $this->validate($request, [
            'nim'  =>  'required',
            'nilaiSm'  =>  'required',
            'nilaiMm'  =>  'required',
            'nilaiPm'  =>  'required',
            'nilaiPtOh'  =>  'required'
        ]);
        $nim = $request->nim;

        if (isset($nim)) {
            return redirect('/stTugas');
        }else{
            return redirect()->back();
        }
    }
    public function datastTugasDeepTalk()
    {
        return view('panel-admin.stTugasDeepTalk');
    }
    public function importstTugasDeepTalk(Request $request)
    {
        $this->validate($request, [
            'tugasDp'  =>  'required'
        ]);
        $Tugas = $request->tugas;

        if (isset($Tugas)) {
            return redirect('/stTugasDeepTalk');
        }else{
            return redirect()->back();
        }
    }
    public function datastTugasFilkomTv()
    {
        return view('panel-admin.stTugasFilkomTv');
    }
    public function importstTugasFilkomTv(Request $request)
    {
        $this->validate($request, [
            'tugasFm'  =>  'required'
        ]);
        $TugasFm = $request->tugasFm;

        if (isset($TugasFm)) {
            return redirect('/stTugasFilkomTv');
        }else{
            return redirect()->back();
        }
    }
    public function dataPkmabsensi()
    {
        return view('panel-admin.Pkmabsensi');
    }
    public function importPkmAbsensi(Request $Request)
    {
        $this->validate($Request, [
            'absensi'  =>  'required'
        ]);
        $absensi = $Request->absensi;

        if (isset($absensi)) {
            return redirect('/pkmAbsensi');
        }else{
            return redirect()->back();
        }
    }
    public function editPkmAbsensi()
    {
        return view('panel-admin.pkmEditAbsensi');
    }
    public function prosesEditPkmAbsensi(Request $Request)
    {
        $this->validate($Request, [
            'nim'  =>  'required',
            'nilaiR1'  =>  'required',
            'nilaiR2'  =>  'required',
            'nilaiR3'  =>  'required'
        ]);
        $nim = $Request->nim;

        if (isset($nim)) {
            return redirect('/pkmAbsensi');
        }else{
            return redirect()->back();
        }
    }
    public function dataPkmKeaktifan()
    {
        return view('panel-admin.pkmKeaktifan');
    }
    public function importPkmKeaktifan(Request $Request)
    {
        $this->validate($Request, [
            'keatifan'  =>  'required'
        ]);
        $keatifan = $Request->keatifan;

        if (isset($keatifan)) {
            return redirect('/pkmKeaktifan');
        }else{
            return redirect()->back();
        }
    }
    public function editPkmKeaktifan()
    {
        return view('panel-admin.pkmEditKeaktifan');
    }
    public function prosesEditPkmKeaktifan(Request $Request)
    {
        $this->validate($Request, [
            'nim'  =>  'required',
            'nilaik1'  =>  'required',
            'nilaip1'  =>  'required',
            'nilaik2'  =>  'required',
            'nilaip2'  =>  'required',
            'nilaik3'  =>  'required',
            'nilaip3'  =>  'required'
        ]);
        $nim = $Request->nim;

        if (isset($nim)) {
            return redirect('/pkmKeaktifan');
        }else{
            return redirect()->back();
        }
    }
    public function dataPkmPelanggaran()
    {
        return view('panel-admin.pkmPelanggaran');
    }
    public function importPkmPelanggaran(Request $Request)
    {
        $this->validate($Request, [
            'pelanggaran'  =>  'required'
        ]);
        $pelanggaran = $Request->pelanggaran;

        if (isset($pelanggaran)) {
            return redirect('/pkmPelanggaran');
        }else{
            return redirect()->back();
        }
    }
    public function editPkmPelanggaran()
    {
        return view('panel-admin.pkmEditPelanggaran');
    }
    public function prosesEditPkmPelanggaran(Request $Request)
    {
        $this->validate($Request, [
            'nim'  =>  'required',
            'ringan'  =>  'required',
            'sedang'  =>  'required',
            'berat'  =>  'required'
        ]);
        $nim = $Request->nim;

        if (isset($nim)) {
            return redirect('/pkmPelanggaran');
        }else{
            return redirect()->back();
        }
    }
    public function dataPkmKelompok()
    {
        return view('panel-admin.pkmKelompok');
    }
    public function importPkmKelompok(Request $Request)
    {
        $this->validate($Request, [
            'pelanggaran'  =>  'required'
        ]);
        $pelanggaran = $Request->pelanggaran;

        if (isset($pelanggaran)) {
            return redirect('/pkmKelompok');
        }else{
            return redirect()->back();
        }
    }
    public function dataPkmTugas()
    {
        return view('panel-admin.pkmTugas');
    }
    public function importPkmTugas(Request $Request)
    {
        $this->validate($Request, [
            'tugas'  =>  'required'
        ]);
        $tugas = $Request->tugas;

        if (isset($tugas)) {
            return redirect('/pkmTugas');
        }else{
            return redirect()->back();
        }
    }
    public function editPkmTugas()
    {
        return view('panel-admin.pkmEditTugas');
    }
    public function prosesEditPkmTugas(Request $Request)
    {
        $this->validate($Request, [
            'nim'  =>  'required',
            'presentasi'  =>  'required',
            'abstraksi'  =>  'required',
            'proposal'  =>  'required'
        ]);
        $nim = $Request->nim;

        if (isset($nim)) {
            return redirect('/pkmTugas');
        }else{
            return redirect()->back();
        }
    }
    public function dataPkmTugasAbstraksi()
    {
        return view('panel-admin.pkmTugasAbstraksi');
    }
    public function importPkmTugasAbstraksi(Request $request)
    {
        $this->validate($request, [
            'esai'  =>  'required'
        ]);
        $esai = $request->esai;

        if (isset($esai)) {
            return redirect('/pkmTugasAbstraksi');
        }else{
            return redirect()->back();
        }
    }
    public function editPkmTugasAbstraksi()
    {
        return view('panel-admin.pkmLihatTugasAbstraksi');
    }
    public function prosesEditPkmTugasAbstraksi(Request $request)
    {
        $this->validate($request, [
            'nilaiabstraksi'  =>  'required'
        ]);
        $nilaiabstraksi = $request->nilaiabstraksi;

        if (isset($nilaiabstraksi)) {
            return redirect('/pkmTugasAbstraksi');
        }else{
            return redirect()->back();
        }
    }
    public function dataProdiFinal()
    {
        return view('panel-admin.prodiFinal');
    }
    public function importProdiFinal(Request $request)
    {
        $this->validate($request, [
            'absensi'  =>  'required'
        ]);
        $absensi = $request->absensi;

        if (isset($absensi)) {
            return redirect('/prodiFinal');
        }else{
            return redirect()->back();
        }
    }
    public function editProdiFinal()
    {
        return view('panel-admin.editProdiFinal');
    }
    public function prosesEditProdiFinal(Request $request)
    {
        $this->validate($request, [
            'nilaiProdi'  =>  'required'
        ]);
        $nilaiProdi = $request->nilaiProdi;

        if (isset($nilaiProdi)) {
            return redirect('/prodiFinal');
        }else{
            return redirect()->back();
        }
    }
}
