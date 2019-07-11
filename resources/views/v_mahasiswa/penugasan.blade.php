@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->

<div class="jumbotron jumbotron-fluid bg-penugasan">
    <div class="container">
        <div class="title-penugasan">Penugasan</div>
        <div class="garis-penugasan"></div>
        <div class="d-flex align-items-center justify-content-center">
            <div class="list-penugasan">                
                <a href="/Twibbon">
                    <div class="item-penugasan">
                        <div class="nama-tugas">Twibbon</div>
                        <div class="row">
                            <div class="col-md-4">Pilihan Ganda</div>
                            <div class="col-md-4">Mulai : 1 Januari 2019 19:30</div>
                            <div class="col-md-4">Berakhir : 1 Januari 2019 23:59</div>
                        </div>
                    </div>
                </a>
                <a href="/Buku-Panduan">
                    <div class="item-penugasan">
                        <div class="nama-tugas">Buku Panduan</div>
                        <div class="row">
                            <div class="col-md-4">Pilihan Ganda</div>
                            <div class="col-md-4">Mulai : 1 Januari 2019 19:30</div>
                            <div class="col-md-4">Berakhir : 1 Januari 2019 23:59</div>
                        </div>
                    </div>
                </a>
                <a href="/Cerita-Tentang-Aku">
                    <div class="item-penugasan">
                        <div class="nama-tugas">Cerita Tentang Aku</div>
                        <div class="row">
                            <div class="col-md-4">Pilihan Ganda</div>
                            <div class="col-md-4">Mulai : 1 Januari 2019 19:30</div>
                            <div class="col-md-4">Berakhir : 1 Januari 2019 23:59</div>
                        </div>
                    </div>
                </a>
                <a href="/Teka-Teki-SiMaba">
                    <div class="item-penugasan">
                        <div class="nama-tugas">Teka Teki SiMABA</div>
                        <div class="row">
                            <div class="col-md-4">Pilihan Ganda</div>
                            <div class="col-md-4">Mulai : 1 Januari 2019 19:30</div>
                            <div class="col-md-4">Berakhir : 1 Januari 2019 23:59</div>
                        </div>
                    </div>
                </a>
                <a href="/Ngobrol-Inspiratif">
                    <div class="item-penugasan">
                        <div class="nama-tugas">Ngobrol Inspiratif</div>
                        <div class="row">
                            <div class="col-md-4">Pilihan Ganda</div>
                            <div class="col-md-4">Mulai : 1 Januari 2019 19:30</div>
                            <div class="col-md-4">Berakhir : 1 Januari 2019 23:59</div>
                        </div>
                    </div>
                </a>
                <a href="/FILKOM-Mengabdi">
                    <div class="item-penugasan">
                        <div class="nama-tugas">FILKOM Mengabdi</div>
                        <div class="row">
                            <div class="col-md-4">Pilihan Ganda</div>
                            <div class="col-md-4">Mulai : 1 Januari 2019 19:30</div>
                            <div class="col-md-4">Berakhir : 1 Januari 2019 23:59</div>
                        </div>
                    </div>
                </a>
                <a href="/Serial-FILKOM">
                    <div class="item-penugasan">
                        <div class="nama-tugas">Serial FILKOM</div>
                        <div class="row">
                            <div class="col-md-4">Pilihan Ganda</div>
                            <div class="col-md-4">Mulai : 1 Januari 2019 19:30</div>
                            <div class="col-md-4">Berakhir : 1 Januari 2019 23:59</div>
                        </div>
                    </div>
                </a>
                <a href="/PKM">
                    <div class="item-penugasan">
                        <div class="nama-tugas">PKM</div>
                        <div class="row">
                            <div class="col-md-4">Pilihan Ganda</div>
                            <div class="col-md-4">Mulai : 1 Januari 2019 19:30</div>
                            <div class="col-md-4">Berakhir : 1 Januari 2019 23:59</div>
                        </div>
                    </div>
                </a>
                <a href="/Kuis-OH">
                    <div class="item-penugasan">
                        <div class="nama-tugas">Kuis OH</div>
                        <div class="row">
                            <div class="col-md-4">Pilihan Ganda</div>
                            <div class="col-md-4">Mulai : 1 Januari 2019 19:30</div>
                            <div class="col-md-4">Berakhir : 1 Januari 2019 23:59</div>
                        </div>
                    </div>
                </a>
                <a href="/CobaIn-Organisasi">
                    <div class="item-penugasan">
                        <div class="nama-tugas">CobaIn Organisasi</div>
                        <div class="row">
                            <div class="col-md-4">Pilihan Ganda</div>
                            <div class="col-md-4">Mulai : 1 Januari 2019 19:30</div>
                            <div class="col-md-4">Berakhir : 1 Januari 2019 23:59</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection