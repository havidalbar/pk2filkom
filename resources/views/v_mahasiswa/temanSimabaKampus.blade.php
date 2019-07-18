@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
<nav class="navbar nav-home navbar-expand-md navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{asset('img/bg-section/simaba2@4x.svg')}}" class="imgCover">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a href="#" class="nav-item nav-link menu">TENTANG SIMABA</a>
                <a href="#" class="nav-item nav-link menu">RANGKAIAN</a>
                <a href="#" class="nav-item nav-link menu">FAQ</a>
                <a href="#" class="nav-item nav-link menu" data-item-ojb="pk2-jb6">BERITA</a>
                <a href="#" class="nav-item nav-link menu">TEMAN SIMABA</a>
                @if (session('nim'))
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        $nama = session('nama');
                        $splitNama = explode(' ', $nama);
                        if (count($splitNama) > 1) {
                            $nama = $splitNama[0] . ' ' . $splitNama[1][0] . '.';
                        }
                        echo $nama;
                        ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Penugasan</a>
                        <a class="dropdown-item" href="#">Penilaian</a>
                        <a class="dropdown-item" href="#">QR Code</a>
                        <a class="dropdown-item" href="#">Nametag</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item logout" href="#">
                            <span><i class="fas fa-sign-out-alt"></i></span>
                            Keluar
                        </a>
                    </div>
                </div>
                @else
                <a href="{{ route('mahasiswa.login', ['redirectTo' => Request::path()]) }}"
                    class="nav-item nav-link ">LOGIN</a>
                @endif
            </div>
        </div>
    </div>
</nav>
<!-- endNavbar atas -->
<div class="jumbotron jumbotron-fluid bg-teman-simaba teman-akademik">
    <div class="container d-flex align-items-center">
        <div class="akademik-intro">
            <img src="{{asset('img/teman-simaba/kampus/infokampus.png')}}" class="img-akademik-text">
            <p class="intro-text">
                Banyak dari kalian tentu masih awam dengan lingkungan kampus maupun fakultas kan? kami merangkumnya pada kolom Info Kampus di TEMAN SIMABA lho!
            </p>
        </div>
    </div>
</div>
<div class="bg-detail-akademik info-kampus">
    <div class="container">
        <!-- Dena -->
        <div class="sub-akademik">
            <div class="text-right sub-title">
                Buat kamu yang masih bingung dengan lokasi-lokasi di FILKOM, bisa cek di peta ini ya!
            </div>
            <div class="float-right garis-sub-title"></div>
            <div class="row sub-pelajaran align-items-center text-right">
                <div class="col-md-5 imgLeft">
                    <img src="{{asset('img/teman-simaba/kampus/denah svg.svg')}}" class="sub-pelajaran-img">
                </div>
                <div class="col-md-7">
                    <div class="info">
                        <ol>
                            <li>Gedung F lama</li>
                            <li>Kantin</li>
                            <li>Gazebo</li>
                            <li>Gedung D</li>
                            <li>Mushola</li>
                            <li>Gedung H</li>
                            <li>Lapangan Merah</li>
                            <li>Gedung C</li>
                            <li>Gedung G</li>
                            <li>Gedung F</li>
                            <li>Gedung B</li>
                            <li>Gedung A</li>
                            <li>Gedung E</li>
                            <li>Tokopedia Corner</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Transportasi -->
        <div class="sub-akademik">
            <div class="text-left sub-title">
                    Transportasi Menuju Kampus
            </div>
            <div class="float-left garis-sub-title"></div>
            <div class="row sub-pelajaran align-items-center text-left">
                <div class="col-md-5 infoImg imgLeft">
                    <img src="{{asset('img/teman-simaba/kampus/ojek.svg')}}" class="sub-pelajaran-img">
                </div>
                <div class="col-md-7">
                    <div class="info">
                        <h1>OJEK</h1>
                        <p>Kamu bisa menuju FILKOM dengan menggunakan jasa ojek maupun ojek dalam jaringan (online) untuk mempermudah akses kamu menuju kampus.</p>
                    </div>
                </div>
            </div>
            <div class="row sub-pelajaran align-items-center text-left">
                <div class="col-md-7">
                    <div class="info">
                        <h1>ANGKOT</h1>
                        <p>Sedikit konvensional apa salahnya? Dengan menggunakan angkot sebagai transportasi akan meminimalisir jatah pengeluaranmu dan berkontribusi mengurangi macetnya kota Malang.</p>
                    </div>
                </div>
                <div class="col-md-5 infoImg imgRight">
                    <img src="{{asset('img/teman-simaba/kampus/angkot svg.svg')}}" class="sub-pelajaran-img">
                </div>
            </div>
        </div>
        <!-- Tempat tinggal -->
        <div class="sub-akademik">
            <div class="text-right sub-title">
                    Cari tempat tinggal?
            </div>
            <div class="float-right garis-sub-title"></div>
            <div class="row sub-pelajaran align-items-center text-left">
                <div class="col-md-7">
                    <div class="info">
                        <h1>RUSUNAWA</h1>
                        <p>Alternatif lain yang dapat menjadi opsi kamu yang masih bingung mencari rumah kost nih! Sangan direkomendasikan karena jaraknya lokasinya juga di dalam kampus sehingga kamu tidak perlu repot-repot pakai transportasi menuju kampus.</p>
                    </div>
                </div>
                <div class="col-md-5 infoImg imgRight">
                    <img src="{{asset('img/teman-simaba/kampus/rusunawa svg.svg')}}" class="sub-pelajaran-img">
                </div>
            </div>
            <div class="row sub-pelajaran align-items-center text-left">
                <div class="col-md-5 infoImg imgLeft">
                    <img src="{{asset('img/teman-simaba/kampus/griya ub.svg')}}" class="sub-pelajaran-img">
                </div>
                <div class="col-md-7">
                    <div class="info">
                        <h1>GRIYA UB</h1>
                        <p>Sudah tahu belum kalau UB punya alternatif tempat tinggal untuk kamu? Lokasinya sangat strategis buat kamu yang malas menggunakan transportasi menuju kampus. Ya! Lokasinya di dalam kampus tercinta kita bahkan berhadapan langsung dengan FILKOM.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akses Drive -->
        <div class="sub-akademik gDrive">
            <div class="text-left sub-title">
                    Penyimpanan Tanpa Batas Di Google-Drive
            </div>
            <div class="float-left garis-sub-title"></div>
            <div class="row sub-pelajaran align-items-center text-left">
                <div class="col-md-5 infoImg imgLeft">
                    <img src="{{asset('img/teman-simaba/kampus/gdrive.svg')}}" class="sub-pelajaran-img">
                </div>
                <div class="col-md-7">
                    <div class="info infoGdrive">
                        <p>Yang biasanya kita dikenai batasan penyimpanan pada Google Drive, kini tidak lagi! Manfaatkan email UB-mu untuk mendapatkan penyimpanan tanpa batas di Google-Drive! Menarik kan?.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@include('layouts.footer')
@endsection