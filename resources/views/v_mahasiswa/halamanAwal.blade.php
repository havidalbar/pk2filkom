@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
<nav class="navbar nav-home navbar-expand-md navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand " data-item-ojb="pk2-jb1" href="{{ route('index') }}">
            <img src="{{asset('img/bg-section/simaba2@4x.svg')}}" class="imgCover">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a href="#" class="nav-item nav-link active" data-item-ojb="pk2-jb3">TENTANG SIMABA</a>
                <a href="#" class="nav-item nav-link " data-item-ojb="pk2-jb5">RANGKAIAN</a>
                <a href="{{ route('faq') }}" class="nav-item nav-link ">FAQ</a>
                <a href="#" class="nav-item nav-link " data-item-ojb="pk2-jb6">BERITA</a>
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
                    <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('mahasiswa.penugasan.index') }}">Penugasan</a>
                        <a class="dropdown-item" href="#">Penilaian</a>
                        <a class="dropdown-item" href="{{ route('mahasiswa.qr-code') }}">QR Code</a>
                        <a class="dropdown-item" href="#">Nametag</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item logout" href="{{ route('mahasiswa.logout') }}">
                            <span><i class="fas fa-sign-out-alt"></i></span>
                            Keluar
                        </a>
                    </div>
                </div>
                @else
                <a href="{{ route('mahasiswa.login') }}" class="nav-item nav-link ">LOGIN</a>
                @endif
            </div>
        </div>
    </div>
</nav>
<!-- endNavbar atas -->

<!-- jumbotronLandingPage -->
<div class="jumbotron jumbotron-fluid pk2-jb1">
    <video autoplay loop id="landingPageVideo">
        <source src="{{asset('vidio/VIDEO GEDUNG.mp4')}}" type="video/mp4">
    </video>

    <div class="container d-flex justify-content-center align-items-center animasi slideKeAtas">
        <div class="pk2imgContent">
            <img src="{{asset('img/bg-section/simaba4@4x.svg')}}" class="img pk2content">
        </div>
        <a href="#" id="swipUp"><i class="fal fa-angle-down"></i></a>
    </div>
</div>
<!-- endJumbotronLandingPage -->

<!-- Title -->
<div class="title">
    <div class="container">
        <div class="row">
            <div class="titlePk2Maba m-auto">
                <h1 class="titleSection">Kenali Pk2Maba Filkom</h1>
            </div>
        </div>
    </div>
</div>
<!-- EndTitle -->

<!-- PK2Maba -->
<div class="jumbotron jumbotron-fluid imgCover pk2-jb2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 mtAfterMoviePk2Maba st2">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/FtZ7ecSekz4"
                        allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-3 offset-md-1 mtAfterMoviePk2Maba">
                <h1 class="afterMovieTxt">WATCH <span class="spanAfterMovie">Our</span> VIDEOS</h1>
                <a href="#">
                    <div class="spanAfterText">LIHAT VIDEO LAINNYA</div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- EndPK2Maba -->

<!-- Title -->
<div class="title">
    <div class="container">
        <div class="row">
            <div class="titlePk2Maba m-auto">
                <h1 class="titleSection">Tentang Simaba</h1>
            </div>
        </div>
    </div>
</div>
<!-- EndTitle -->

<!-- tentangPK2Maba -->
<!-- <div style="height:100vh;border:1px solid yellow"> -->
<div class="jumbotron jumbotron-fluid imgCover pk2-jb3">
    <div class="container">
        <div class="row h-100 align-items-center">
            <div class="col-md-7 col-lg-6 mr-auto">
                <div class="media pk2ttgsimana">
                    <div class="media-body">
                        <h5 class="title-pk2">tentang pk2maba</h5>
                        <p>Simaba merupakan portal sistem informasi yang khusus ditujukan bagi Mahasiswa Baru
                            Fakultas Ilmu Komputer 2019. Sistem ini dibuat secara online untuk menunjang
                            transparansi Acara PK2Maba & Startup Academy 2019 dalam menyampaikan penugasan dan
                            memberikan penilaian terhadap pelaksanaan kegiatan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="jumbotron jumbotron-fluid imgCover pk2-jb4">
    <div class="row">
        <div class="col-md-6 imgCover bg-polka">
            <h1 class="title-faq">Faq</h1>
            <a href="{{  route('faq') }}" class="btn btn-faq">LIHAT SEMUA PERTANYAAN</a>
        </div>
        <div class="col-md-6">
            <div class="row h-100">
                <div class="col-md-6 imgCover bg-color-filkom">
                    <h4 class="title-inf">@pk2maba_filkom</h4>
                    <h4 class="title-subInf">[HARI KARTINI]</h4>
                    <p class="title-info">Selamat malam, Mahasiswa Baru FILKOM 2019! Hari Kartini hadir sebagai
                        bentuk ucapan terimakasih kita kepada pahlawan Nasional Indonesia yang telah memperjuangkan
                        emansipasi wanita dan menjadi pelopor kebangkitan kaum wanita.</p>
                    <p class="title-info">Selamat malam, Mahasiswa Baru FILKOM 2019! Hari Kartini hadir sebagai
                        bentuk ucapan terimakasih kita kepada pahlawan Nasional Indonesia yang telah memperjuangkan
                        emansipasi wanita dan menjadi pelopor kebangkitan kaum wanita.</p>
                    <p class="title-info">Selamat malam, Mahasiswa Baru FILKOM 2019! Hari Kartini hadir sebagai
                        bentuk ucapan terimakasih kita kepada pahlawan Nasional Indonesia yang telah memperjuangkan
                        emansipasi wanita dan menjadi pelopor kebangkitan kaum wanita.</p>
                </div>
                <div class="sep"><i class="fab fa-instagram"></i></div>
                <div class="col-md-6 imgCover bg-gdfilkom">
                    <div class="hovereffect">
                        <img class="img-responsive" src="{{asset('img/bg-section/gedfbidongkuning.png')}}" alt="">
                        <div class="overlay">
                            <p class="icon-links">
                                <a href="https://www.instagram.com/pk2maba_filkom/"><i data-icon="b"></i></a>
                                <a href="http://bit.ly/OAPK2FILKOM"><i data-icon="e"></i></a>
                                <a href="http://twitter.com/PK2FILKOM2019"><i data-icon="f"></i></a>
                                <a href="http://bit.ly/PK2MABAFILKOM"><i data-icon="a"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->

<!-- endTentangPK2Maba -->

<!-- Title -->
<div class="title">
    <div class="container">
        <div class="row">
            <div class="titlePk2Maba m-auto">
                <h1 class="titleSection">Timeline rangkaian</h1>
            </div>
        </div>
    </div>
</div>
<!-- EndTitle -->

<!-- timeLine -->
<div class="jumbotron jumbotron-fluid imgCover pk2-jb5">
    <div class="bg-timeLine">
        <div id="carousel-timeline" class="carousel slide" data-ride="carousel" data-interval="false">
            <ol class="carousel-indicators">
                <li data-target="#carousel-timeline" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-timeline" data-slide-to="1"></li>
                <li data-target="#carousel-timeline" data-slide-to="2"></li>
                <li data-target="#carousel-timeline" data-slide-to="3"></li>
                <li data-target="#carousel-timeline" data-slide-to="4"></li>
                <li data-target="#carousel-timeline" data-slide-to="5"></li>
                <li data-target="#carousel-timeline" data-slide-to="6"></li>
                <li data-target="#carousel-timeline" data-slide-to="7"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <figure class="figure">
                                    <img src="{{asset('img/bg-section/ki2@4x@2x.png')}}"
                                        class="figure-img img-fluid rounded">
                                </figure>
                            </div>
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <div class="media timeLine">
                                    <div class="media-body">
                                        <h5 class="mt-0 title">PK2MABA</h5>
                                        <h6 class="publis">Hari Pertama</h6>
                                        <p>Merupakan acara penyambutan Mahasiswa Baru
                                            Fakultas Ilmu Komputer 2019 dan pembekalan untuk
                                            memulai kehidupan sebagai mahasiswa Fakultas Ilmu Komputer
                                            Universitas Brawijaya.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <figure class="figure">
                                    <img src="{{asset('img/bg-section/ki2@4x@2x.png')}}"
                                        class="figure-img img-fluid rounded">
                                </figure>
                            </div>
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <div class="media timeLine">
                                    <div class="media-body">
                                        <h5 class="mt-0 title">PK2MABA</h5>
                                        <h6 class="publis">Hari Kedua</h6>
                                        <p>Merupakan acara penyambutan Mahasiswa Baru
                                            Fakultas Ilmu Komputer 2019 dan pembentukan pola
                                            pikir mahasiswa baru Fakultas Ilmu Komputer
                                            Universitas Brawijaya.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <figure class="figure">
                                    <img src="{{asset('img/bg-section/ki2@4x@2x.png')}}"
                                        class="figure-img img-fluid rounded">
                                </figure>
                            </div>
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <div class="media timeLine">
                                    <div class="media-body">
                                        <h5 class="mt-0 title">PKM Rangkaian 1</h5>
                                        {{-- <h6 class="publis">08 September 2019</h6> --}}
                                        <p>PKM adalah bagian dari kegiatan PK2MABA dan Startup Academy.
                                            PKM dilaksanakan dengan cara memberikan bimbingan kepada mahasiswa
                                            baru yang bertujuan untuk mengenalkan hal-hal yang lebih detail
                                            pembuatan karya ilmiah sehingga kelak dapat berpartisipasi dalam
                                            ajang PKM dan mampu mengikuti Pekan Ilmiah Mahasiswa Nasional.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <figure class="figure">
                                    <img src="{{asset('img/bg-section/ki2@4x@2x.png')}}"
                                        class="figure-img img-fluid rounded">
                                </figure>
                            </div>
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <div class="media timeLine">
                                    <div class="media-body">
                                        <h5 class="mt-0 title">Kelas Inspirasi</h5>
                                        {{-- <h6 class="publis">08 September 2019</h6> --}}
                                        <p>Kelas Inspirasi merupakan rangkaian pertama dari Startup Academy 2019.
                                            Kegiatan ini berupa seminar dan talkshow. Materi yang akan diberikan
                                            adalah leadership, entrepreneurship dan achievement yang akan diisi oleh
                                            pemateri yang berpengalaman dalam bidangnya.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <figure class="figure">
                                    <img src="{{asset('img/bg-section/ki2@4x@2x.png')}}"
                                        class="figure-img img-fluid rounded">
                                </figure>
                            </div>
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <div class="media timeLine">
                                    <div class="media-body">
                                        <h5 class="mt-0 title">Open House</h5>
                                        {{-- <h6 class="publis">08 September 2019</h6> --}}
                                        <p>Open House FILKOM merupakan rangkaian kedua dari Startup Academy 2019.
                                            Kegiatan ini akan diisi dengan pengenalan LSO maupun LO yang ada di
                                            Fakultas Ilmu Komputer. Open House yang akan diselenggarakan akan
                                            dikemas seperti bazar atau pameran, dimana dalam rangkaian ini setiap
                                            anggota dari LSO maupun LO memberikan tampilan terbaik untuk mengenalkan
                                            LSO atau LO masing masing.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <figure class="figure">
                                    <img src="{{asset('img/bg-section/ki2@4x@2x.png')}}"
                                        class="figure-img img-fluid rounded">
                                </figure>
                            </div>
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <div class="media timeLine">
                                    <div class="media-body">
                                        <h5 class="mt-0 title">PKM Rangkaian 2</h5>
                                        {{-- <h6 class="publis">08 September 2019</h6> --}}
                                        <p>PKM adalah bagian dari kegiatan PK2MABA dan Startup Academy.
                                            PKM dilaksanakan dengan cara memberikan bimbingan kepada mahasiswa
                                            baru yang bertujuan untuk mengenalkan hal-hal yang lebih detail pembuatan
                                            karya ilmiah sehingga kelak dapat berpartisipasi dalam ajang PKM dan mampu
                                            mengikuti Pekan Ilmiah Mahasiswa Nasional.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <figure class="figure">
                                    <img src="{{asset('img/bg-section/ki2@4x@2x.png')}}"
                                        class="figure-img img-fluid rounded">
                                </figure>
                            </div>
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <div class="media timeLine">
                                    <div class="media-body">
                                        <h5 class="mt-0 title">Outbond</h5>
                                        {{-- <h6 class="publis">08 September 2019</h6> --}}
                                        <p>Outbound merupakan rangkaian ketiga Startup Academy 2019
                                            dimana pada kegiatan ini panitia telah menyiapkan beberapa permainan
                                            menarik yang bertujuan untuk memberikan hiburan sekaligus menanamkan
                                            beberapa nilai kekeluargaan kepada mahasiswa baru Fakultas Ilmu Komputer
                                            2019..</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <figure class="figure">
                                    <img src="{{asset('img/bg-section/ki2@4x@2x.png')}}"
                                        class="figure-img img-fluid rounded">
                                </figure>
                            </div>
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <div class="media timeLine">
                                    <div class="media-body">
                                        <h5 class="mt-0 title">PKM Final</h5>
                                        <h6 class="publis">08 September 2019</h6>
                                        <p>PKM adalah bagian dari kegiatan PK2MABA dan Startup Academy.
                                            PKM dilaksanakan dengan cara memberikan bimbingan kepada mahasiswa
                                            baru yang bertujuan untuk mengenalkan hal-hal yang lebih detail pembuatan
                                            karya ilmiah sehingga kelak dapat berpartisipasi dalam ajang PKM dan mampu
                                            mengikuti Pekan Ilmiah Mahasiswa Nasional.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-timeline" role="button" data-slide="prev">
                <span class="timeLine-prev" aria-hidden="true"><i class="far fa-chevron-left"></i></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-timeline" role="button" data-slide="next">
                <span class="timeLine-next" aria-hidden="true"><i class="far fa-chevron-right"></i></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<!-- endTimeLine -->

<!-- Title -->
<div class="title">
    <div class="container">
        <div class="row">
            <div class="titlePk2Maba m-auto">
                <h1 class="titleSection">Berita</h1>
            </div>
        </div>
    </div>
</div>
<!-- EndTitle -->

<!-- berita -->
<div class="jumbotron jumbotron-fluid pk2-jb6">
    <div class="container d-flex align-items-center justify-content-center">
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-12 col-md-6">
                <div class="hovereffect-berita">
                    <img class="img1" src="{{asset('img/berita/kartini.png')}}" alt="">
                    <div class="overlay">
                        <h2>Selamat Hari Kartini 2019</h2>
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <a class="info" href="#">Lihat Berita</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="hovereffect-berita">
                            <img class="img2" src="{{asset('img/berita/myhome.jpg')}}" alt="">
                            <div class="overlay">
                                <h2>Selamat Hari Buruh 2019</h2>
                                <div class="h-100 d-flex align-items-center justify-content-center">
                                    <a class="info" href="#">Lihat Berita</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="hovereffect-berita">
                            <img class="img2" src="{{asset('img/berita/Artboard 4.png')}}" alt="">
                            <div class="overlay">
                                <h2>Atribut dan Barang Bawaan</h2>
                                <div class="h-100 d-flex align-items-center justify-content-center">
                                    <a class="info" href="#">Lihat Berita</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="hovereffect-berita">
                            <img class="img2" src="{{asset('img/berita/IMG_0069_birukuning.png')}}" alt="">
                            <div class="overlay">
                                <h2>Atribut dan Barang Bawaan</h2>
                                <div class="h-100 d-flex align-items-center justify-content-center">
                                    <a class="info" href="#">Lihat Berita</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="hovereffect-berita">
                            <img class="img2" src="{{asset('img/berita/line1.png')}}" alt="">
                            <div class="overlay">
                                <h2>Selamat Datang Mahasiswa Baru</h2>
                                <div class="h-100 d-flex align-items-center justify-content-center">
                                    <a class="info" href="#">Lihat Berita</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="btn btn-berita">LIHAT SEMUA BERITA</a>
        </div>
    </div>
</div>
<!-- endBerita -->

<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection