@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
<nav class="navbar nav-home navbar-expand-md navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{asset('img/bg-section/simaba2@4x.svg')}}" class="imgCover">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a href="{{ route('index') }}" class="nav-item nav-link menu">TENTANG SIMABA</a>
                <a href="{{ route('index') }}" class="nav-item nav-link menu">RANGKAIAN</a>
                <a href="{{ route('faq') }}" class="nav-item nav-link menu">FAQ</a>
                <a href="{{ route('index') }}" class="nav-item nav-link menu">BERITA</a>
                <a href="{{route('teman-simaba')}}" class="nav-item nav-link menu">TEMAN SIMABA</a>
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
                        <a class="dropdown-item" href="{{ route('mahasiswa.penugasan.index') }}">Penugasan</a>
                        <a class="dropdown-item" href="{{ route('mahasiswa.penilaian') }}">Penilaian</a>
                        <a class="dropdown-item" href="{{ route('mahasiswa.qr-code') }}">QR Code</a>
                        <a class="dropdown-item" href="{{ route('mahasiswa.nametag') }}">Nametag</a>
                        <a class="dropdown-item" href="{{ route('mahasiswa.penugasan-kelompok-pkm.index') }}">PKM KELOMPOK</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item logout" href="{{ route('mahasiswa.logout') }}">
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
<div class="jumbotron jumbotron-fluid bg-teman-simaba-akademik">
    <div class="container d-flex align-items-center">
        <div class="akademik-intro">
            <img src="{{asset('img/teman-simaba/akademik/infoakademik-text.png')}}" class="img-akademik-text">
            <p class="intro-text">
                Buat kamu yang masih bingung dan kesulitan mencari informasi terkait tipe pembelajaran di FILKOM, kami
                merangkumnya di kolom INFO AKADEMIK. Dicek ya!
            </p>
        </div>
    </div>
</div>
<div class="bg-detail-akademik">
    <div class="container">
        <!-- Pelajaran -->
        <div class="sub-akademik">
            <div class="text-right sub-title">
                Belajar apa aja sih di fakultas ilmu komputer?
            </div>
            <div class="float-right garis-sub-title"></div>
            <div class="row sub-pelajaran align-items-center text-right">
                <div class="col-md-5">
                    <img src="{{asset('img/teman-simaba/akademik/programming.png')}}" class="sub-pelajaran-img">
                </div>
                <div class="col-md-7">
                    <div class="sub-pelajaran-title">Pemrograman</div>
                    <div class="sub-pelajaran-text">Yang dipelajari dalam pemrograman adalah berbagai macam bahasa
                        pemrograman untuk menyusun algoritma yang dapat kita gunakan untuk mengembangkan sebuah program,
                        aplikasi, atau software.</div>
                </div>
            </div>
            <div class="row sub-pelajaran align-items-center">
                <div class="col-md-5">
                    <img src="{{asset('img/teman-simaba/akademik/logic.png')}}" class="sub-pelajaran-img">
                </div>
                <div class="col-md-7 order-first">
                    <div class="sub-pelajaran-title">Logika Matematika</div>
                    <div class="sub-pelajaran-text">Dalam pemrograman pun programming memerlukan logika yang
                        terlatih, maka kita di sini juga belajar matematika untuk melatih
                        logika kita dan mengembangkan algoritma.
                    </div>
                </div>
            </div>
            <div class="row sub-pelajaran align-items-center text-right">
                <div class="col-md-5">
                    <img src="{{asset('img/teman-simaba/akademik/manajemen.png')}}" class="sub-pelajaran-img">
                </div>
                <div class="col-md-7">
                    <div class="sub-pelajaran-title">Manajemen</div>
                    <div class="sub-pelajaran-text">
                        Di FILKOM kita juga belajar manajemen agar kita dapat mengolah
                        suatu ide bisnis untuk mengembangkan proyek. Lebih khususnya
                        adalah manajemen di bidang tenologi informasi.
                    </div>
                </div>
            </div>
        </div>
        <!-- Kurikulum -->
        <div class="sub-akademik mt-5">
            <div class="sub-title">
                Kurikulum di filkom seperti apa ya?
            </div>
            <div class="garis-sub-title"></div>
            <div class="text-left sub-text">
                Fakultas Ilmu Komputer Universitas Brawijaya menyajikan banyak pilihan mata kuliah yang dikelompokkan ke
                dalam kelompok keminatan. Seperti berikut ini:
            </div>
            <div class="sub-kurikulum">
                <ul class="nav nav-tabs justify-content-center align-items-center" id="tab-kurikulum" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="teknik-informatika-tab" data-toggle="tab"
                            href="#teknik-informatika" role="tab" aria-controls="teknik-informatika"
                            aria-selected="true">Teknik Informatika</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="teknik-komputer-tab" data-toggle="tab" href="#teknik-komputer"
                            role="tab" aria-controls="teknik-komputer" aria-selected="false">Teknik Komputer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sistem-informasi-tab" data-toggle="tab" href="#sistem-informasi"
                            role="tab" aria-controls="sistem-informasi" aria-selected="false">Sistem Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="teknologi-informasi-tab" data-toggle="tab" href="#teknologi-informasi"
                            role="tab" aria-controls="teknologi-informasi" aria-selected="false">Teknologi Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pend-teknologi-informasi-tab" data-toggle="tab"
                            href="#pend-teknologi-informasi" role="tab" aria-controls="pend-teknologi-informasi"
                            aria-selected="false">Pend. Teknologi Informasi</a>
                    </li>
                </ul>
                <div class="tab-content" id="tab-kurikulum">
                    <div class="tab-pane fade show active" id="teknik-informatika" role="tabpanel"
                        aria-labelledby="teknik-informatika-tab">
                        <div class="keminatan">Keminatan Rekayasa Perangkat Lunak (RPL)</div>
                        <div class="keminatan">Keminatan Teknologi Game (Game Tech)</div>
                        <div class="keminatan">Keminatan Komputasi Cerdas (KC)</div>
                        <div class="keminatan">Keminatan Jaringan Komputer (JK)</div>
                        <div class="matkul">klik tautan di bawah ini untuk melihat mata kuliah apa saja yang akan kamu
                            pelajari!</div>
                        <a href="http://tif.filkom.ub.ac.id/unit/prodi/tif/read/pg-kurikulum/1cbe28e1fb30fb"
                            target="_blank">
                            <div class="link-matkul">
                                Kurikulum TIF
                            </div>
                        </a>
                    </div>
                    <div class="tab-pane fade" id="teknik-komputer" role="tabpanel"
                        aria-labelledby="teknik-komputer-tab">
                        <div class="keminatan">Keminatan Rekayasa Sistem Komputer</div>
                        <div class="keminatan">Keminatan Rekayasa Perangkat Cerdas</div>
                        <div class="matkul">klik tautan di bawah ini untuk melihat mata kuliah apa saja yang akan kamu
                            pelajari!</div>
                        <a href="http://comvis.filkom.ub.ac.id/unit/prodi/tkom/read/kurikulum/f3e30f0b4b4fea"
                            target="_blank">
                            <div class="link-matkul">
                                Kurikulum TEKKOM
                            </div>
                        </a>
                    </div>
                    <div class="tab-pane fade" id="sistem-informasi" role="tabpanel"
                        aria-labelledby="sistem-informasi-tab">
                        <div class="keminatan">Pengembangan Sistem Informasi</div>
                        <div class="keminatan">Tata Kelola Sistem Informasi</div>
                        <div class="keminatan">Manajemen IT</div>
                        <div class="keminatan">Geoinformatika</div>
                        <div class="matkul">klik tautan di bawah ini untuk melihat mata kuliah apa saja yang akan kamu
                            pelajari!</div>
                        <a href="http://si.filkom.ub.ac.id/unit/prodi/si/read/jadwal-perkuliahan/39c07d38bf9ee3"
                            target="_blank">
                            <div class="link-matkul">
                                Kurikulum SI
                            </div>
                        </a>
                    </div>
                    <div class="tab-pane fade" id="teknologi-informasi" role="tabpanel"
                        aria-labelledby="teknologi-informasi-tab">
                        <div class="keminatan">Keminatan Pengembangan Sistem Informasi</div>
                        <div class="keminatan">Keminatan Integrator Sistem</div>
                        <div class="keminatan">Keminatan Pengelola Data dan Informasi</div>
                        <div class="keminatan">Keminatan Pengembangan Teknologi Jaringan</div>
                        <div class="matkul">klik tautan di bawah ini untuk melihat mata kuliah apa saja yang akan kamu
                            pelajari!</div>
                        <a href="http://ti.filkom.ub.ac.id/unit/prodi/ti/read/kurikulum-/761c4bb7d0ae3c"
                            target="_blank">
                            <div class="link-matkul">
                                Kurikulum TI
                            </div>
                        </a>
                    </div>
                    <div class="tab-pane fade" id="pend-teknologi-informasi" role="tabpanel"
                        aria-labelledby="pend-teknologi-informasi-tab">
                        <div class="keminatan">Tenaga Pendidik di bidang TI</div>
                        <div class="matkul">klik tautan di bawah ini untuk melihat mata kuliah apa saja yang akan kamu
                            pelajari!</div>
                        <a href="http://pti.filkom.ub.ac.id/unit/prodi/pti/read/kurikulum-/8e01bf5ec3419e"
                            target="_blank">
                            <div class="link-matkul">
                                Kurikulum PTI
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Persiapan -->
        <div class="sub-akademik mt-5">
            <div class="text-right sub-title">
                Sebelum kuliah, harus melakukan persiapan apa aja ya?
            </div>
            <div class="float-right garis-sub-title"></div>
            <div class="d-flex flex-column align-items-center sub-persiapan">
                <div class="persiapan-text text-right">
                    Pemrograman bukan ilmu yang bisa dipelajari sehari atau dua hari. Untuk itu kami membagi informasi
                    terkait website yang bisa kamu gunakan untuk belajar pemrograman. Cek di bawah sini ya!
                </div>
                <div class="col-md-10 d-flex flex-column align-items-center sub-website">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="http://www.codepolitan.com" target="_blank">
                                    <div class="link-website">www.codepolitan.com</div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="http://www.petanikode.com" target="_blank">
                                    <div class="link-website">www.petanikode.com</div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="http://www.kodedasar.com" target="_blank">
                                    <div class="link-website">www.kodedasar.com</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 mt-4">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="http://www.codewars.com" target="_blank">
                                    <div class="link-website">www.codewars.com</div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="http://www.edx.org" target="_blank">
                                    <div class="link-website">www.edx.org</div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="http://www.coursera.org" target="_blank">
                                    <div class="link-website">www.coursera.org</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portal -->
        <div class="sub-akademik">
            <div class="sub-portal">
                <div class="filkom-title">
                    PORTAL PEMBELAJARAN DI FILKOM
                </div>
                <div class="filkom-text">
                    Kamu tahu? Ternyata FILKOM mempunyai portal pembelajar sendiri loh.
                    E-Learning FILKOM biasanya digunakan untuk membagikan informasi
                    terkait mata kuliah yang ada di FILKOM baik berupa bahan ajar, tugas,
                    ataupun pelaksanaan kuis dan ujian online. Yuk coba mampir ke link ini!
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    <a href="https://elearning-filkom.ub.ac.id" target="_blank">
                        <div class="link">elearning-filkom.ub.ac.id</div>
                    </a>
                </div>
            </div>
        </div>
        <!-- Filkom Apps -->
        <div class="sub-akademik">
            <div class="sub-filkom-apps">
                <div class="filkom-title text-right">
                    KITA PUNYA FILKOM-Apps!
                </div>
                <div class="filkom-text text-right">
                    Untuk apa sih kita punya FILKOM-Apps? Nah tentu masih banyak yang asing dengan istilah FILKOM-Apps.
                    FILKOM-Apps merupakan platform khusus untuk mahasiswa FILKOM mengakses hal terkait akademik seperti
                    pengajuan KRS (Kartu Rencana Studi), pengurusan PKL (Praktik Kerja Lapangan), hingga skripsi. Bukan
                    hanya itu, di FILKOM-Apps kamu juga bisa mengetahui informasi terkait jadwal dosen yang hendak kamu
                    temui ataupun ruangan-ruangan FILKOM yang 'available' kamu akses untuk keperluan tertentu. Dan masih
                    banyak lagi! Yuk maksimalkan fasilitas ini.
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    <a href="https://filkom.ub.ac.id/apps" target="_blank">
                        <div class="link">filkom.ub.ac.id/apps</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
