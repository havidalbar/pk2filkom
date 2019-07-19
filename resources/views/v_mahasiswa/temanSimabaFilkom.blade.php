@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
<nav class="navbar nav-home navbar-expand-md navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{asset('img/bg-section/simaba2@4x.svg')}}" class="imgCover">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <a href="{{ route('mahasiswa.login', ['redirectTo' => Request::path()]) }}" class="nav-item nav-link ">LOGIN</a>
                @endif
            </div>
        </div>
    </div>
</nav>
<!-- endNavbar atas -->
<div class="jumbotron jumbotron-fluid bg-teman-simaba-filkom">
    <div class="container d-flex align-items-center">
        <div class="filkom-intro">
            <img src="{{asset('img/teman-simaba/filkom/info-filkom-text.png')}}" class="img-filkom-text">
            <p class="intro-text">
                Udah jadi mahasiswa filkom, kok belum kenal sama fakultas sendiri?
                Yuk simak info dibawah!
            </p>
        </div>
    </div>
</div>
<div class="bg-detail-filkom">
    <div class="container">
        <!-- Program Studi -->
        <div class="sub-filkom mt-5">
            <div class="text-right sub-title">
                Ada program studi apa aja sih di filkom?
            </div>
            <div class="float-right garis-sub-title"></div>
            <!-- <div class="text-left sub-text">
                Fakultas Ilmu Komputer Universitas Brawijaya menyajikan banyak pilihan mata kuliah yang dikelompokkan ke
                dalam kelompok keminatan. Seperti berikut ini:
            </div> -->
            <div class="sub-studi">
                <ul class="nav nav-tabs justify-content-center align-items-center" id="tab-kurikulum" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="teknik-informatika-tab" data-toggle="tab" href="#teknik-informatika" role="tab" aria-controls="teknik-informatika" aria-selected="true">Teknik Informatika</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="teknik-komputer-tab" data-toggle="tab" href="#teknik-komputer" role="tab" aria-controls="teknik-komputer" aria-selected="false">Teknik Komputer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sistem-informasi-tab" data-toggle="tab" href="#sistem-informasi" role="tab" aria-controls="sistem-informasi" aria-selected="false">Sistem Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="teknologi-informasi-tab" data-toggle="tab" href="#teknologi-informasi" role="tab" aria-controls="teknologi-informasi" aria-selected="false">Teknologi Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pend-teknologi-informasi-tab" data-toggle="tab" href="#pend-teknologi-informasi" role="tab" aria-controls="pend-teknologi-informasi" aria-selected="false">Pend. Teknologi Informasi</a>
                    </li>
                </ul>
                <div class="tab-content" id="tab-studi">
                    <div class="tab-pane fade show active" id="teknik-informatika" role="tabpanel" aria-labelledby="teknik-informatika-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-prodi col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/tif.png')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        Menyajikan pemanfaatan teknologi informasi dalam proses identifikasi
                                        masalah, pengolahan data dan informasi, serta pemecahan masalah dan
                                        pengambilan keputusan sesuai dengan prinsip keilmuan dan
                                        kerekayasaan.
                                    </div>
                                    <div class="text-left sub-text-studi">
                                        Adapun prospek kerja dari prodi ini sebagai berikut!
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="text-left job-list">- Software Engineer</div>
                                                <div class="text-left job-list">- System Analyst</div>
                                                <div class="text-left job-list">- Konsultan IT</div>
                                                <div class="text-left job-list">- Database Engineer</div>
                                                <div class="text-left job-list">- Web Engineer/Administrator</div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="text-left job-list">- Programmer</div>
                                                <div class="text-left job-list">- Computer Network</div>
                                                <div class="text-left job-list">- Software Tester</div>
                                                <div class="text-left job-list">- Game Developer</div>
                                                <div class="text-left job-list">- Intelligent System Developer</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="teknik-komputer" role="tabpanel" aria-labelledby="teknik-komputer-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-prodi col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/tekkom.png')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        Men-sinergikan kecerdasan manusia dengan kecanggihan teknologi
                                        perangkat lunak dan kehandalan perangkat keras untuk mewujudkan
                                        sebuah sistem cerdas yang mampu meningkatkan kesejahteraan
                                        manusia.
                                    </div>
                                    <div class="text-left sub-text-studi">
                                        Adapun prospek kerja dari prodi ini sebagai berikut!
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="text-left job-list">- Networking</div>
                                                <div class="text-left job-list">- Robotik dan Otomatisasi</div>
                                                <div class="text-left job-list">- Digital System</div>
                                                <div class="text-left job-list">- Computer System Management</div>
                                                <div class="text-left job-list">- Mobile Technology dan Embedded System</div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="text-left job-list">- Help Desk</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sistem-informasi" role="tabpanel" aria-labelledby="sistem-informasi-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-prodi col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/si.png')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        Berfokus pada peningkatan kemampuan manajerial teknologi informasi
                                        dan komunikasi serta sumber daya manusia dimana diharapkan akan
                                        menciptakan sebuah sistem yang mampu mengakomodir akan
                                        kebutuhan informasi yang berkembang pesat.
                                    </div>
                                    <div class="text-left sub-text-studi">
                                        Adapun prospek kerja dari prodi ini sebagai berikut!
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="text-left job-list">- Database dan e-Business</div>
                                                <div class="text-left job-list">- System Analyst</div>
                                                <div class="text-left job-list">- Programmer Analyst</div>
                                                <div class="text-left job-list">- System Design</div>
                                                <div class="text-left job-list">- Database Administrator</div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="text-left job-list">- IT Consultant</div>
                                                <div class="text-left job-list">- Web Developer/Designer</div>
                                                <div class="text-left job-list">- Entrepreneur IT Business</div>
                                                <div class="text-left job-list">- IS Auditor</div>
                                                <div class="text-left job-list">- IS Project Manager</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="teknologi-informasi" role="tabpanel" aria-labelledby="teknologi-informasi-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-prodi col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/ti.png')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        Berkonsentrasi untuk menghasilkan lulusan yang berkualitas di bidang
                                        teknologi Informasi, memiliki kemampuan untuk berkompetisi di dunia
                                        kerja sesuai standar ACM (Association for Computing Machinery ).
                                    </div>
                                    <div class="text-left sub-text-studi">
                                        Adapun prospek kerja dari prodi ini sebagai berikut!
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="text-left job-list">- Integrator Sistem</div>
                                                <div class="text-left job-list">- Pengembang Teknologi Jaringan</div>
                                                <div class="text-left job-list">- Pengelola Data dan Informasi</div>
                                                <div class="text-left job-list">- Pengembang Sistem Informasi</div>
                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pend-teknologi-informasi" role="tabpanel" aria-labelledby="pend-teknologi-informasi-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-prodi col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/pti.png')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        Berkonsentrasi menjawab tantangan global dengan mendidik
                                        mahasiswa untuk memiliki kompetensi sebagai tenaga pendidik
                                        sekaligus memiliki kompetensi tenaga profesional IT dan entrepreneur.
                                    </div>
                                    <div class="text-left sub-text-studi">
                                        Adapun prospek kerja dari prodi ini sebagai berikut!
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="text-left job-list">- Tenaga pendidik di bidang IT</div>
                                                <div class="text-left job-list">- Pengembang produk pembelajaran</div>
                                                <div class="text-left job-list">- Pengembang dengan geospasial</div>
                                                <div class="text-left job-list">- Penegmbang media pembelajaran berbasis TI</div>
                                            </div>
                                            <div class="col-md-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Program Studi -->
        <!-- Lembaga Otonom -->
        <div class="sub-filkom mt-5">
            <div class="sub-title">
                Ingin mengembangkan softskill? Yuk gabung lembaga!
            </div>
            <div class="garis-sub-title"></div>
            <div class="text-left sub-lembaga">
                Lembaga Otonom
            </div>
            <div class="sub-studi">
                <ul class="nav nav-tabs justify-content-center align-items-center" id="tab-kurikulum" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="bem-tab" data-toggle="tab" href="#bem" role="tab" aria-controls="bem" aria-selected="true">BEM FILKOM UB</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="dpm-tab" data-toggle="tab" href="#dpm" role="tab" aria-controls="dpm" aria-selected="false">DPM FILKOM UB</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="hima-tab" data-toggle="tab" href="#hima" role="tab" aria-controls="hima" aria-selected="false">HIMAPRODI</a>
                    </li>
                </ul>
                <div class="tab-content" id="tab-studi">
                    <div class="tab-pane fade show active" id="bem" role="tabpanel" aria-labelledby="bem-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-lain col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/bem.png')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        BADAN EKSEKUTIF MAHASISWA
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        Lembaga ini merupakan organisasi eksekutif yang bertugas menjalankan roda pemerintahan dari
                                        Keluarga Besar Mahasiswa Fakultas Ilmu Komputer.
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        BEM FILKOM hadir untuk mempertanggungjawabkan hak yang seharusnyaditerima oleh mahasiswa
                                        melalui kegiatan aktualasi diri kemahasiswaan. Sederhananya, setiap uang yang dibayarkan oleh
                                        mahasiswa kepada pihak fakultas termuat hak mahasiswa dalam kegiatan aktualisasi diri kehidupan kampus.
                                        Info lebih lanjut bisa kamu cek di linimasa di bawah ini ya!
                                    </div>
                                    <div class="text-left sub-text-lo">Instagram : <a href="#">@bemfilkomub</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dpm" role="tabpanel" aria-labelledby="dpm-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-lain col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/dpm.png')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        DEWAN PERWAKILAN MAHASISWA
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        Badan perwakilan legislatif mahasiswa yang memiliki tugas untuk mengemban
                                        kedaulatan dan memberikan kebijakan yang mencerminkan mahasiswa FILKOM.
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        DPM FILKOM merupakan wakil - wakil mahasiswa yang dipilih langsung oleh mahasiswa
                                        melalui pemilihan umum “PEMILWA FILKOM” dengan mekanisme yang telah di tetapkan.
                                        DPM FILKOM terdiri dari 9 anggota yang berasal dari 5 prodi yang berbeda yaitu Teknik Informatika,
                                        Teknik Komputer, Sistem Informasi dan Pendidikan Teknologi Informasi.
                                        Info lebih lanjut bisa kamu cek di linimasa di bawah ini ya!
                                    </div>
                                    <div class="text-left sub-text-lo">Instagram : <a href="#">@dpmfilkomub</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="hima" role="tabpanel" aria-labelledby="hima-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="description-studi">
                                    HIMPUNAN MAHASISWA PROGRAM STUDI
                                </div>
                            </div>
                            <div class="row">
                                <div class="text-left sub-text-lo">
                                    Adanya himpunan mahasiswa disini dimaksudkan untuk menaungi advokasi dan birokrasi mahasiswa
                                    di lingkup lebih kecil lagi yaitu tingkat program studi.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Lembaga Otonom -->
        <!-- LSO -->
        <div class="sub-filkom mt-5">
            <div class="text-left sub-lembaga">
                Lembaga Semi Otonom
            </div>
            <div class="sub-studi">
                <ul class="nav nav-tabs justify-content-center align-items-center" id="tab-kurikulum" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="raion-tab" data-toggle="tab" href="#raion" role="tab" aria-controls="raion" aria-selected="true">RAION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="display-tab" data-toggle="tab" href="#display" role="tab" aria-controls="display" aria-selected="false">DISPLAY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="krisma-tab" data-toggle="tab" href="#krisma" role="tab" aria-controls="krisma" aria-selected="false">K-RISMA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="optiik-tab" data-toggle="tab" href="#optiik" role="tab" aria-controls="optiik" aria-selected="false">OPTIIK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="poros-tab" data-toggle="tab" href="#poros" role="tab" aria-controls="poros" aria-selected="false">POROS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="bios-tab" data-toggle="tab" href="#bios" role="tab" aria-controls="bios" aria-selected="false">BIOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="amd-tab" data-toggle="tab" href="#amd" role="tab" aria-controls="amd" aria-selected="false">LKI-AMD</a>
                    </li>
                </ul>
                <div class="tab-content" id="tab-studi">
                    <div class="tab-pane fade show active" id="raion" role="tabpanel" aria-labelledby="raion-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-lain col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/raion.png')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        RAION
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        Lembaga wadah pengembangan kreativitas dan inovasi yang berfokus pada
                                        pengembangan aplikasi mobile bagi mahasiswa FILKOM.
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        Pasti penasaran kan apa saja kegiatan RAION? Nah salahsatu program kerjanya
                                        adalah RAION Hackjam, RAION Produktif, Bakti Sosial, Studi Banding, Gamosphere,
                                        dan Raion Academy. Menarik kan? Yuk lihat lebih lanjut di linimasanya!
                                    </div>
                                    <div class="text-left sub-text-lo">Instagram : <a href="#">@raion_community</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="display" role="tabpanel" aria-labelledby="display-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-lain col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/display.png')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        DISPLAY
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        DISPLAY merupakan Lembaga Pers Mahasiswa yaitu sebuah lembaga semi otonom yang bergerak dalam dunia jurnalistik.
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        DISPLAY suatu alat yang menyajikan informasi tentang lingkungan yang
                                        dikomunikasikan, maka LPM DISPLAY menyajikan berbagai informasi
                                        teraktual dan akurat baik dalam bidang sosial, budaya, maupun teknologi
                                        untuk masyarakat umum khususnya keluarga besar FILKOM dan Universitas Brawijaya.
                                        Mau tahu lebih dalam? Yuk ikuti linimasanya!
                                    </div>
                                    <div class="text-left sub-text-lo">Instagram : <a href="#">@displayfilkom</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="krisma" role="tabpanel" aria-labelledby="krisma-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-lain col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/krisma.png')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        K-RISMA
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        K-RISMA merupakan lembaga semi-otonom yang bergerak dalam bidang riset dan penalaran.
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        K-RISMA memiliki tujuan untuk mengembangkan potensi mahasiswa dalam hal keilmiahan serta penalaran
                                        disiplin IT guna menumbuhkan sikap keterbukaan, demokratis, ilmiah,
                                        kompetitif, dan kritis para anggotanya dalam pengembangan ilmu pengetahuan dan teknologi. Tidak kalah keren kan? Yuk ikuti linimasanya!
                                    </div>
                                    <div class="text-left sub-text-lo">Instagram : <a href="#">@krisma_filkom_ub</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="optiik" role="tabpanel" aria-labelledby="optiik-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-lain col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/optiik.png')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        OPTTIK
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        OPTIIK merupakan wadah pengembangan kreativitas dan inovasi yang berfokus pada
                                        bidang fotografi dan desain bagi mahasiswa FILKOM.
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        OPTIIK bergerak dibidang Fotografi dan Desain serta memiliki tagline
                                        “Beyond Community We Are Family”. Wah keren! Yuk ikuti linimasanya
                                    </div>
                                    <div class="text-left sub-text-lo">Instagram : <a href="#">@displayfilkom</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="poros" role="tabpanel" aria-labelledby="poros-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-lain col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/poros.png')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        POROS
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        POROS merupakan lembaga semi-otonom yang mewadahi para penggemar Open Source di lingkungan FILKOM.
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        Seiring dengan berubahnya PTIIK
                                        menjadi Fakultas Ilmu Komputer, maka ke panjangan dari POROS diubah menjadi POROS Organization
                                        of Open Source. Mau tahu lebih banyak lagi tentang POROS? Yuk ikuti linimasanya!
                                    </div>
                                    <div class="text-left sub-text-lo">Instagram : <a href="#">@porosfilkom</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="bios" role="tabpanel" aria-labelledby="bios-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-lain col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/bios.png')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        BIOS
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        BIOS merupakan lembaga semi-otonom sebagai wadah pengembangan olahraga dan seni untuk mahasiswa FILKOM.
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        BIOS berusaha merangkul dan mewadahi minat mahasiswa dibidang olahraga dan seni dengan membuka
                                        divisi-divisi tertentu dan mengadakan event yang berkaitan, juga aktif dalam mencari talent dan
                                        atlet di dalam fakultas guna dipersiapkan untuk perlombaan-perlombaan yang ada. Wah keren kan? Yuk ikuti linimasanya!
                                    </div>
                                    <div class="text-left sub-text-lo">Instagram : <a href="#">@biosfilkomub</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="amd" role="tabpanel" aria-labelledby="amd-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-lain col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/amd.png')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        LKI-AMD
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        LKI-AMD merupakan lembaga dakwah di lingkungan FILKOM. Mewadahi kegiatan kerohanian islam.
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        Pasti penasaran nih apa ya kira-kira kepanjangan dari LKI AMD? Lembaga Kajian Islam
                                        Al-Fatih Muslim Drenalin (LKI-AMD. Kalau kamu masih penasaran, yuk ikuti linimasanya!
                                    </div>
                                    <div class="text-left sub-text-lo">Instagram : <a href="#">@amdfilkomub</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of LSO -->
        <!-- Komunitas -->
        <div class="sub-filkom mt-5">
            <div class="text-left sub-lembaga">
                Komunitas
            </div>
            <div class="sub-studi">
                <ul class="nav nav-tabs justify-content-center align-items-center" id="tab-kurikulum" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="bcc-tab" data-toggle="tab" href="#bcc" role="tab" aria-controls="bcc" aria-selected="true">BCC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="robotik-tab" data-toggle="tab" href="#robotik" role="tab" aria-controls="robotik" aria-selected="false">ROBOTIIK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="kontribusi-tab" data-toggle="tab" href="#kontribusi" role="tab" aria-controls="kontribusi" aria-selected="false">KONTRIBUSI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="gforce-tab" data-toggle="tab" href="#gforce" role="tab" aria-controls="gforce" aria-selected="false">G-FORCE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="ayodev-tab" data-toggle="tab" href="#ayodev" role="tab" aria-controls="ayodev" aria-selected="false">AYODEV</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pmk-tab" data-toggle="tab" href="#pmk" role="tab" aria-controls="pmk" aria-selected="false">PMK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="kmk-tab" data-toggle="tab" href="#kmk" role="tab" aria-controls="kmk" aria-selected="false">KMK</a>
                    </li>
                </ul>
                <div class="tab-content" id="tab-studi">
                    <div class="tab-pane fade show active" id="bcc" role="tabpanel" aria-labelledby="bcc-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-lain col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/bcc.png')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        BCC
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        BCC merupakan komunitas yang berada dibawah naungan Laboratorium Pembelajaran Ilmu Komputer Universitas
                                        Brawijaya yang bergerak dibidang teknologi. Kepanjangannya adalah Basic Computing Community.
                                        Program terkenal yang dicanangkan komunitas ini adalah KLINIK KODING yang tujuannya adalah membantu
                                        mahasiswa FILKOM yang merasa kesulitas di mata kuliah pemrograman dan sejenisnya. Tertarik? Ikuti linimasanya ya!
                                    </div>
                                    <div class="text-left sub-text-lo">Instagram : <a href="#">@bccfilkom</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="robotik" role="tabpanel" aria-labelledby="robotik-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-lain col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/robotik.png')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        ROBOTIIK
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        ROBOTIIK merupakan komunitas sebagai wadah pengembangan kreativitas robotika, penelitian,
                                        dan lomba yang terkait di ranah robotika. Selain menoreh banyak prestasi, komunitas ini juga
                                        menyelenggarakan banyak kegiatan. Menarik bukan? Jangan lupa ikuti linimasanya ya.
                                    </div>
                                    <div class="text-left sub-text-lo">Instagram : <a href="#">@robo_tiik</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="kontribusi" role="tabpanel" aria-labelledby="kontribusi-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-lain col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/kontribusi.jpg')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        KONTRIBUSI
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        KONTRIBUSI merupakan komunitas pelestari buku dan diskusi Fakultas Ilmu Komputer Universitas Brawijaya.
                                        Kalau kamu ingin tahu apa saja kegiatannya, diantaranya adalah perpustakaan jalanan, di kala kamis siang,
                                        dan lapakan di gazebo FILKOM. Masih banyak yang ingin kamu tahu? Yuk ikuti linimasanya!
                                    </div>
                                    <div class="text-left sub-text-lo">Instagram : <a href="#">@kontribusifilkom</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="gforce" role="tabpanel" aria-labelledby="gforce-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-lain col-md-4">
                                    <!-- <img src="{{asset('img/teman-simaba/filkom/optiik.png')}}" class="img-filkom-text"> -->
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        G-FORCE
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        GFORCE merupakan komunitas peduli lingkungan Fakultas Ilmu Komputer Universitas Brawijaya.
                                        Beberapa kegiatannya seperti kamis bersih, bank sampah, dan banyak lagi yang tidak kalah menarik. Masih penasaran kan? Ini dia linimasanya!
                                    </div>
                                    <div class="text-left sub-text-lo">Instagram : <a href="#">@gforces.official</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ayodev" role="tabpanel" aria-labelledby="ayodev-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-lain col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/ayodev.png')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        AYODEV
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        Ayodev merupakan suatu komunitas yang menaungi mahasiswa informatika dalam bereksplorasi,
                                        belajar, dan berkarya dalam bidang web dan mobile apps.
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        Ayodev jga mewadahi mahasiswa informatika yang ingin mempelajari tentang desain ui dan ux. Kemudian dari hasil pembelajaran
                                        yang telah didapatkan semua peserta akan dikelompokkan menjadi beberpa tim yang tergabung dari tiap department(web/mobile/uiux)
                                        yang nantinya akan diikutkan ke lomba. Masih pengen tahu lebih lanjut? Ini websitenya!
                                    </div>
                                    <div class="text-left sub-text-lo">Website : <a href="#">ayodevstudio.filkom.ub.ac.id</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pmk" role="tabpanel" aria-labelledby="pmk-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-lain col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/pmk.png')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        PMK
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        PMK merupakan komunitas keluarga mahasiswa protestan. Banyak sekali kegiatan yang diselenggarakan komunitas ini,
                                        biasanya perayaan hari besar keagamaan umat protestan dan masih banyak lagi. Kamu ingin tahu? Jangan lupa ikuti linimasanya ya!
                                    </div>
                                    <div class="text-left sub-text-lo">Instagram : <a href="#">@pmkdaniel</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="kmk" role="tabpanel" aria-labelledby="kmk-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="logo-lain col-md-4">
                                    <img src="{{asset('img/teman-simaba/filkom/kmk.jpg')}}" class="img-filkom-text">
                                </div>
                                <div class="col-md-8">
                                    <div class="text-left description-studi">
                                        KMK
                                    </div>
                                    <div class="text-left sub-text-lo">
                                        KMK merupakan komunitas keluarga mahasiswa katolik Fakultas Ilmu Komputer Universitas Brawijaya.
                                        Banyak sekali kegiatan yang diselenggarakan komunitas ini, biasanya perayaan hari besar keagamaan
                                        umat katolik dan masih banyak lagi. Kamu ingin tahu? Jangan lupa cek lebih lanjut di linimasanya ya!
                                    </div>
                                    <div class="text-left sub-text-lo">Instagram : <a href="#">@kmkfilkom</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Komunitas -->
        <!-- Kamu Harus Tau -->
        <div class="sub-filkom mt-5">
            <div class="text-right sub-title">
                Kamu Harus Tahu!
            </div>
            <div class="float-right garis-sub-title"></div>
            <div class="sub-studi fakta">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="fakta col-md-12">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3">
                                        <img src="{{asset('img/teman-simaba/filkom/mash-classroom.png')}}" class="img-filkom-text">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="text-left description-studi">
                                            #FAKTA1
                                        </div>
                                        <div class="text-left sub-text-lo">
                                            FILKOM MENERAPKAN SISTEM MASH-CLASSROOM
                                        </div>
                                        <div class="text-left sub-text-lo">
                                            Apa itu mash-classroom? Mash-classroom merupakan teknologi smart class yang memungkinkan proses
                                            pembelajaran di suatu tempat dapat diikuti oleh peserta di tempat yang berbeda secara interaktif.
                                            Metode ini biasanya diterapkan ketika dosen berhalangan hadir karena halangan tertentu di tempat
                                            lain sehingga kelas tetap bisa berlangsung secara interaktif. Keren kan? Bangga menjadi mahasiswa FILKOM.
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="fakta col-md-12">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3">
                                        <img src="{{asset('img/teman-simaba/filkom/filkom-jepang.png')}}" class="img-filkom-text">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="text-left description-studi">
                                            #FAKTA2
                                        </div>
                                        <div class="text-left sub-text-lo">
                                            KERJA SAMA DENGAN 6 KAMPUS JEPANG
                                        </div>
                                        <div class="text-left sub-text-lo">
                                            Tahukah kamu kalau FILKOM sedang menjalin kerjasama dengan 6 kampus ternama di Jepang?
                                            Kampus tersebut adalah Chukyo University, Waseda University, Osaka University, Hiroshima
                                            University, Kyushu Institute of Technology, dan Kitakyushu University. Kerjasama ini dijalin
                                            untuk kepentingan seperti student-exchange, pengiriman dosen untuk studi lanjutan, publikasi
                                            jurnal, konferensi, hingga riset. Kamu punya mimpi ke Jepang? Bisa banget terwujud disini!
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="fakta col-md-12">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3">
                                        <img src="{{asset('img/teman-simaba/filkom/tokped-corner.png')}}" class="img-filkom-text">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="text-left description-studi">
                                            #FAKTA3
                                        </div>
                                        <div class="text-left sub-text-lo">
                                            ADA TOKOPEDIA CORNER LOH
                                        </div>
                                        <div class="text-left sub-text-lo">
                                            Tahukah kamu? Ternyata kita punya tokopedia corner loh di dalam FILKOM! Buat apa sih kira-kita
                                            tokopedia corner ini? Jadi kalau kamu membeli barang di tokopedia dengan mencantumkan alamat FILKOM
                                            akan free-shipping, barang tinggal kamu ambil di tokopedia corner ini. Mantap kan? Belanja online jadi lebih hemat.
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Kamu Harus Tau -->
</div>
</div>
@include('layouts.footer')
@endsection