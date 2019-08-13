@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->
<div class="jumbotron jumbotron-fluid bg-penilaian">
    <div class="container">
        <h1 class="titlePenilaian">Nilai</h1>
        <div class="garisPenilaian"></div>
        <div class="container bg-nilai">
            <ul class="nav nav-tabs justify-content-center align-items-center" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="semua-tab" data-toggle="tab" href="#semua" role="tab"
                        aria-controls="semua" aria-selected="true">Semua penilaian</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pk2maba-tab" data-toggle="tab" href="#pk2maba" role="tab"
                        aria-controls="pk2maba" aria-selected="false">PK2MABA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pkm-tab" data-toggle="tab" href="#pkm" role="tab" aria-controls="pkm"
                        aria-selected="false">PKM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="startup-tab" data-toggle="tab" href="#startup" role="tab"
                        aria-controls="startup" aria-selected="false">STARTUP ACADEMY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="cluster-tab" data-toggle="tab" href="#cluster" role="tab"
                        aria-controls="cluster" aria-selected="false">CLUSTER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="penugasan-tab" data-toggle="tab" href="#penugasan" role="tab"
                        aria-controls="penugasan" aria-selected="false">PENUGASAN</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active table-responsive bg-table" id="semua" role="tabpanel"
                    aria-labelledby="semua-tab">
                    <table class="table table-striped table-borderless" style="text-align:center">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Jenis Penilaian</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                //tab rekap semua

                                //pk2
                                $totalPK2 = $mahasiswa->rekap_nilai_pk2maba['absensi']->nilai_rangkaian1 +
								$mahasiswa->rekap_nilai_pk2maba['absensi']->nilai_rangkaian2 +
								$mahasiswa->rekap_nilai_pk2maba['keaktifan']->aktif_rangkaian1 +
								$mahasiswa->rekap_nilai_pk2maba['keaktifan']->aktif_rangkaian2 +
								$mahasiswa->rekap_nilai_pk2maba['keaktifan']->penerapan_nilai_rangkaian1 +
								$mahasiswa->rekap_nilai_pk2maba['keaktifan']->penerapan_nilai_rangkaian2 +
								$mahasiswa->rekap_nilai_pk2maba['pelanggaran']->ringan +
								$mahasiswa->rekap_nilai_pk2maba['pelanggaran']->sedang +
                                $mahasiswa->rekap_nilai_pk2maba['pelanggaran']->berat;
                                $statusLulusPk2 = '';
                                if($totalPK2>=100){
                                    $statusLulusPk2 = 'LULUS';
                                }else if($totalPK2==0){
                                    $statusLulusPk2 = '-';
                                }else{
                                    $statusLulusPk2 = 'TIDAK LULUS';
                                }

                                //pkm
                                $totalPKM = $mahasiswa->rekap_nilai_pkm['absensi']->nilai_rangkaian6 +
                                $mahasiswa->rekap_nilai_pkm['absensi']->nilai_rangkaian7 +
                                $mahasiswa->rekap_nilai_pkm['absensi']->nilai_rangkaian8 +
								$mahasiswa->rekap_nilai_pkm['keaktifan']->aktif_rangkaian6 +
                                $mahasiswa->rekap_nilai_pkm['keaktifan']->aktif_rangkaian7 +
                                $mahasiswa->rekap_nilai_pkm['keaktifan']->aktif_rangkaian8 +
								$mahasiswa->rekap_nilai_pkm['keaktifan']->penerapan_nilai_rangkaian6 +
                                $mahasiswa->rekap_nilai_pkm['keaktifan']->penerapan_nilai_rangkaian7 +
                                $mahasiswa->rekap_nilai_pkm['keaktifan']->penerapan_nilai_rangkaian8 +
								$mahasiswa->rekap_nilai_pkm['pelanggaran']->ringan +
								$mahasiswa->rekap_nilai_pkm['pelanggaran']->sedang +
                                $mahasiswa->rekap_nilai_pkm['pelanggaran']->berat;
                                $statusLulusPKM = '';
                                if($totalPKM>=100){
                                    $statusLulusPKM = 'LULUS';
                                }else if($totalPKM==0){
                                    $statusLulusPKM = '-';
                                }else{
                                    $statusLulusPKM = 'TIDAK LULUS';
                                }

                                //startup
                                $totalStartup = $mahasiswa->rekap_nilai_startup['absensi']->nilai_rangkaian3 +
								$mahasiswa->rekap_nilai_startup['absensi']->nilai_rangkaian4 +
								$mahasiswa->rekap_nilai_startup['absensi']->nilai_rangkaian5 +
								$mahasiswa->rekap_nilai_startup['keaktifan']->aktif_rangkaian3 +
								$mahasiswa->rekap_nilai_startup['keaktifan']->aktif_rangkaian4 +
								$mahasiswa->rekap_nilai_startup['keaktifan']->aktif_rangkaian5 +
								$mahasiswa->rekap_nilai_startup['keaktifan']->penerapan_nilai_rangkaian3 +
								$mahasiswa->rekap_nilai_startup['keaktifan']->penerapan_nilai_rangkaian4 +
								$mahasiswa->rekap_nilai_startup['keaktifan']->penerapan_nilai_rangkaian5 +
								$mahasiswa->rekap_nilai_startup['pelanggaran']->ringan +
								$mahasiswa->rekap_nilai_startup['pelanggaran']->sedang +
								$mahasiswa->rekap_nilai_startup['pelanggaran']->berat;
                                $statusLulusStartup = '';
                                if($totalStartup>=240){
                                    $statusLulusStartup = 'LULUS';
                                }else if($totalStartup==0){
                                    $statusLulusStartup = '-';
                                }else{
                                    $statusLulusStartup = 'TIDAK LULUS';
                                }

                                //prodi
                                $statusLulusProdi = '';
                                if($mahasiswa->nilai_prodi->nilai_full>=190){
                                    $statusLulusProdi = 'LULUS';
                                }else if($mahasiswa->nilai_prodi->nilai_full==0){
                                    $statusLulusProdi = '-';
                                }else{
                                    $statusLulusProdi = 'TIDAK LULUS';
                                }

                                //tab pk2
                                $statusPk2h1 = '';
                                if($mahasiswa->rekap_nilai_pk2maba['absensi']->nilai_rangkaian1 == 20){
                                    $statusPk2h1 = 'Izin';
                                }else if($mahasiswa->rekap_nilai_pk2maba['absensi']->nilai_rangkaian1 == 25){
                                    $statusPk2h1 = 'Sakit';
                                }else if($mahasiswa->rekap_nilai_pk2maba['absensi']->nilai_rangkaian1 == 30){
                                    $statusPk2h1 = 'Hadir';
                                }else{
                                    $statusPk2h1 = '-';
                                }
                                $statusPk2h2 = '';
                                if($mahasiswa->rekap_nilai_pk2maba['absensi']->nilai_rangkaian2 == 20){
                                    $statusPk2h2 = 'Izin';
                                }else if($mahasiswa->rekap_nilai_pk2maba['absensi']->nilai_rangkaian2 == 25){
                                    $statusPk2h2 = 'Sakit';
                                }else if($mahasiswa->rekap_nilai_pk2maba['absensi']->nilai_rangkaian2 == 30){
                                    $statusPk2h2 = 'Hadir';
                                }else{
                                    $statusPk2h2 = '-';
                                }
                                $nilaiAktifPk2 = $mahasiswa->rekap_nilai_pk2maba['keaktifan']->aktif_rangkaian1 +
								$mahasiswa->rekap_nilai_pk2maba['keaktifan']->aktif_rangkaian2 +
								$mahasiswa->rekap_nilai_pk2maba['keaktifan']->penerapan_nilai_rangkaian1 +
                                $mahasiswa->rekap_nilai_pk2maba['keaktifan']->penerapan_nilai_rangkaian2;
                                $statusAktifPk2 = '';
                                if($nilaiAktifPk2>0){
                                    $statusAktifPk2 = 'Aktif';
                                }else{
                                    $statusAktifPk2 = 'Tidak Aktif';
                                }
                                $nilaiPelanggaranPk2 = $mahasiswa->rekap_nilai_pk2maba['pelanggaran']->ringan +
								$mahasiswa->rekap_nilai_pk2maba['pelanggaran']->sedang +
                                $mahasiswa->rekap_nilai_pk2maba['pelanggaran']->berat;
                                $statusPelanggaranPk2 = '';
                                if($nilaiPelanggaranPk2<0){
                                    $statusPelanggaranPk2 = 'Ada';
                                }else{
                                    $statusPelanggaranPk2 = 'Tidak Ada';
                                }

                                //tab pkm
                                $statusPkmh1 = '';
                                if($mahasiswa->rekap_nilai_pkm['absensi']->nilai_rangkaian6 == 20){
                                    $statusPkmh1 = 'Izin';
                                }else if($mahasiswa->rekap_nilai_pkm['absensi']->nilai_rangkaian6 == 25){
                                    $statusPkmh1 = 'Sakit';
                                }else if($mahasiswa->rekap_nilai_pkm['absensi']->nilai_rangkaian6 == 30){
                                    $statusPkmh1 = 'Hadir';
                                }else{
                                    $statusPkmh1 = '-';
                                }
                                $statusPkmh2 = '';
                                if($mahasiswa->rekap_nilai_pkm['absensi']->nilai_rangkaian7 == 20){
                                    $statusPkmh2 = 'Izin';
                                }else if($mahasiswa->rekap_nilai_pkm['absensi']->nilai_rangkaian7 == 25){
                                    $statusPkmh2 = 'Sakit';
                                }else if($mahasiswa->rekap_nilai_pkm['absensi']->nilai_rangkaian7 == 30){
                                    $statusPkmh2 = 'Hadir';
                                }else{
                                    $statusPkmh2 = '-';
                                }
                                $statusPkmh3 = '';
                                if($mahasiswa->rekap_nilai_pkm['absensi']->nilai_rangkaian8 == 20){
                                    $statusPkmh3 = 'Izin';
                                }else if($mahasiswa->rekap_nilai_pkm['absensi']->nilai_rangkaian8 == 25){
                                    $statusPkmh3 = 'Sakit';
                                }else if($mahasiswa->rekap_nilai_pkm['absensi']->nilai_rangkaian8 == 30){
                                    $statusPkmh3 = 'Hadir';
                                }else{
                                    $statusPkmh3 = '-';
                                }

                                $nilaiAktifPkm = $mahasiswa->rekap_nilai_pkm['keaktifan']->aktif_rangkaian6 +
                                $mahasiswa->rekap_nilai_pkm['keaktifan']->aktif_rangkaian7 +
                                $mahasiswa->rekap_nilai_pkm['keaktifan']->aktif_rangkaian8;
                                $statusAktifPkm = '';
                                if($nilaiAktifPkm>0){
                                    $statusAktifPkm = 'Aktif';
                                }else{
                                    $statusAktifPkm = 'Tidak Aktif';
                                }
                                $penerapanPkm = $mahasiswa->rekap_nilai_pkm['keaktifan']->penerapan_nilai_rangkaian6 +
                                $mahasiswa->rekap_nilai_pkm['keaktifan']->penerapan_nilai_rangkaian7 +
                                $mahasiswa->rekap_nilai_pkm['keaktifan']->penerapan_nilai_rangkaian8;
                                $statusPenerapanPkm = '';
                                if($penerapanPkm>0){
                                    $statusPenerapanPkm = 'Aktif';
                                }else{
                                    $statusPenerapanPkm = 'Tidak Aktif';
                                }

                                $nilaiPelanggaranPkm = $mahasiswa->rekap_nilai_pkm['pelanggaran']->ringan +
								$mahasiswa->rekap_nilai_pkm['pelanggaran']->sedang +
                                $mahasiswa->rekap_nilai_pkm['pelanggaran']->berat;
                                $statusPelanggaranPkm = '';
                                if($nilaiPelanggaranPkm<0){
                                    $statusPelanggaranPkm = 'Ada';
                                }else{
                                    $statusPelanggaranPkm = 'Tidak Ada';
                                }

                                //tab startup
                                $statusKi = '';
                                if($mahasiswa->rekap_nilai_startup['absensi']->nilai_rangkaian3 == 20){
                                    $statusKi = 'Izin';
                                }else if($mahasiswa->rekap_nilai_startup['absensi']->nilai_rangkaian3 == 25){
                                    $statusKi = 'Sakit';
                                }else if($mahasiswa->rekap_nilai_startup['absensi']->nilai_rangkaian3 == 30){
                                    $statusKi = 'Hadir';
                                }else{
                                    $statusKi = '-';
                                }

                                $statusOh = '';
                                if($mahasiswa->rekap_nilai_startup['absensi']->nilai_rangkaian4 == 20){
                                    $statusOh = 'Izin';
                                }else if($mahasiswa->rekap_nilai_startup['absensi']->nilai_rangkaian4 == 25){
                                    $statusOh = 'Sakit';
                                }else if($mahasiswa->rekap_nilai_startup['absensi']->nilai_rangkaian4 == 30){
                                    $statusOh = 'Hadir';
                                }else{
                                    $statusOh = '-';
                                }

                                $statusOb = '';
                                if($mahasiswa->rekap_nilai_startup['absensi']->nilai_rangkaian5 == 20){
                                    $statusOb = 'Izin';
                                }else if($mahasiswa->rekap_nilai_startup['absensi']->nilai_rangkaian5 == 25){
                                    $statusOb = 'Sakit';
                                }else if($mahasiswa->rekap_nilai_startup['absensi']->nilai_rangkaian5 == 30){
                                    $statusOb = 'Hadir';
                                }else{
                                    $statusOb = '-';
                                }

                                $nilaiAktifStartup = $mahasiswa->rekap_nilai_startup['keaktifan']->aktif_rangkaian3 +
                                $mahasiswa->rekap_nilai_startup['keaktifan']->aktif_rangkaian4 +
                                $mahasiswa->rekap_nilai_startup['keaktifan']->aktif_rangkaian5 +
                                $mahasiswa->rekap_nilai_startup['keaktifan']->penerapan_nilai_rangkaian3 +
                                $mahasiswa->rekap_nilai_startup['keaktifan']->penerapan_nilai_rangkaian4 +
                                $mahasiswa->rekap_nilai_startup['keaktifan']->penerapan_nilai_rangkaian5;
                                $statusAktifStartup = '';
                                if($nilaiAktifStartup>0){
                                    $statusAktifStartup = 'Aktif';
                                }else{
                                    $statusAktifStartup = 'Tidak Aktif';
                                }

                                $nilaiPelanggaranStartup = $mahasiswa->rekap_nilai_pkm['pelanggaran']->ringan +
								$mahasiswa->rekap_nilai_startup['pelanggaran']->sedang +
                                $mahasiswa->rekap_nilai_startup['pelanggaran']->berat;
                                $statusPelanggaranStartup = '';
                                if($nilaiPelanggaranStartup<0){
                                    $statusPelanggaranStartup = 'Ada';
                                }else{
                                    $statusPelanggaranStartup = 'Tidak Ada';
                                }
                                ?>
                                <th scope="row">1</th>
                                <td>PK2MABA</td>
                                <td>{{$statusLulusPk2}}</td>
                                <td>{{$totalPK2}}</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>PKM</td>
                                <td>{{$statusLulusPKM}}</td>
                                <td>{{$totalPKM}}</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>STARTUP ACADEMY</td>
                                <td>{{$statusLulusStartup}}</td>
                                <td>{{$totalStartup}}</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>OSPEK PRODI</td>
                                <td>{{$statusLulusProdi}}</td>
                                <td>{{ $mahasiswa->nilai_prodi->nilai_full }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade table-responsive bg-table" id="pk2maba" role="tabpanel"
                    aria-labelledby="pk2maba-tab">
                    <table class="table table-striped table-borderless" style="text-align:center">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Jenis Penilaian</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Presensi Hari Ke-1</td>
                                <td>{{$statusPk2h1}}</td>
                                <td>{{$mahasiswa->rekap_nilai_pk2maba['absensi']->nilai_rangkaian1}}</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Presensi Hari Ke-2</td>
                                <td>{{$statusPk2h2}}</td>
                                <td>{{$mahasiswa->rekap_nilai_pk2maba['absensi']->nilai_rangkaian2}}</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Tugas (Online)</td>
                                <td>-</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Nilai Keaktifan</td>
                                <td>{{$statusAktifPk2}}</td>
                                <td>{{$nilaiAktifPk2}}</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Pelanggaran</td>
                                <td>{{$statusPelanggaranPk2}}</td>
                                <td>{{$nilaiPelanggaranPk2}}</td>
                            </tr>
                            <tr>
                                <td class="totalPoin" colspan="3">Total Poin</td>
                                <td>{{$totalPK2}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade table-responsive bg-table" id="pkm" role="tabpanel" aria-labelledby="pkm-tab">
                    <table class="table table-striped table-borderless" style="text-align:center">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Jenis Penilaian</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Presensi PKM 1</td>
                                <td>{{$statusPkmh1}}</td>
                                <td>{{$mahasiswa->rekap_nilai_pkm['absensi']->nilai_rangkaian6}}</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Presensi PKM 2</td>
                                <td>{{$statusPkmh2}}</td>
                                <td>{{$mahasiswa->rekap_nilai_pkm['absensi']->nilai_rangkaian7}}</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Presensi PKM 3</td>
                                <td>{{$statusPkmh3}}</td>
                                <td>{{$mahasiswa->rekap_nilai_pkm['absensi']->nilai_rangkaian8}}</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Abstraksi</td>
                                <td>-</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Presentasi Ide</td>
                                <td>-</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Proposal</td>
                                <td>-</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>Nilai Keaktifan</td>
                                <td>{{$statusAktifPkm}}</td>
                                <td>{{$nilaiAktifPkm}}</td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>Penerapan Nilai</td>
                                <td>{{$statusPenerapanPkm}}</td>
                                <td>{{$penerapanPkm}}</td>
                            </tr>
                            <tr>
                                <th scope="row">9</th>
                                <td>Pelanggaran</td>
                                <td>{{$statusPelanggaranPkm}}</td>
                                <td>{{$nilaiPelanggaranPkm}}</td>
                            </tr>
                            <tr>
                                <td class="totalPoin" colspan="3">Total Poin</td>
                                <td>{{$totalPKM}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade table-responsive bg-table" id="startup" role="tabpanel"
                    aria-labelledby="startup-tab">
                    <table class="table table-striped table-borderless" style="text-align:center">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Jenis Penilaian</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Kelas Inspirasi</td>
                                <td>{{$statusKi}}</td>
                                <td>{{$mahasiswa->rekap_nilai_startup['absensi']->nilai_rangkaian3}}</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Open House</td>
                                <td>{{$statusOh}}</td>
                                <td>{{$mahasiswa->rekap_nilai_startup['absensi']->nilai_rangkaian4}}</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Outbond</td>
                                <td>{{$statusOb}}</td>
                                <td>{{$mahasiswa->rekap_nilai_startup['absensi']->nilai_rangkaian5}}</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Nilai Keaktifan</td>
                                <td>{{$statusAktifStartup}}</td>
                                <td>{{$nilaiAktifStartup}}</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Tugas</td>
                                <td>Hadir</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Pelanggaran</td>
                                <td>{{$statusPelanggaranStartup}}</td>
                                <td>{{$nilaiPelanggaranStartup}}</td>
                            </tr>
                            <tr>
                                <td class="totalPoin" colspan="3">Total Poin</td>
                                <td>{{$totalStartup}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade table-responsive bg-table" id="cluster" role="tabpanel"
                    aria-labelledby="cluster-tab">
                    <table class="table table-striped table-borderless" style="text-align:center">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Jenis Penilaian</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Poin Awal</td>
                                <td>-</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Pelanggaran</td>
                                <td>-</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Tidak Melaporkan Progress Tugas</td>
                                <td>-</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td class="totalPoin" colspan="3">Total Poin</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade table-responsive bg-table" id="penugasan" role="tabpanel"
                    aria-labelledby="penugasan-tab">
                    <table class="table table-striped table-borderless" style="text-align:center">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Penugasan</th>
                                <th scope="col">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa->nilai_penugasan_full as $index => $nilai_penugasan)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $nilai_penugasan['judul_penugasan'] }}</td>
                                <td>{{ $nilai_penugasan['nilai'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection