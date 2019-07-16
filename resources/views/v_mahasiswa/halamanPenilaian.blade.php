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
                                <th scope="row">1</th>
                                <td>PK2MABA</td>
                                @if (session('nim'))
                                <td><b>LULUS</b></td>
                                @else
                                <td><b>LULUS</b></td>
                                @endif
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>PKM</td>
                                <td>LULUS</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>STARTUP ACADEMY</td>
                                <td>LULUS</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>OSPEK PRODI</td>
                                <td>LULUS</td>
                                <td>0</td>
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
                                <td>Hadir</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Presensi Hari Ke-2</td>
                                <td>Hadir</td>
                                <td>0</td>
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
                                <td>-</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Pelanggaran</td>
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
                                <td>Hadir</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Presensi PKM 2</td>
                                <td>Hadir</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Abstraksi</td>
                                <td>-</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Presentasi Ide</td>
                                <td>-</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Proposal</td>
                                <td>-</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Nilai Keaktifan</td>
                                <td>-</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>Penerapan Nilai</td>
                                <td>-</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>Pelanggaran</td>
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
                                <td>Hadir</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Open House</td>
                                <td>Hadir</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Outbond</td>
                                <td>Hadir</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Nilai Keaktifan</td>
                                <td>Hadir</td>
                                <td>0</td>
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
                                <td>Hadir</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td class="totalPoin" colspan="3">Total Poin</td>
                                <td>0</td>
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
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection