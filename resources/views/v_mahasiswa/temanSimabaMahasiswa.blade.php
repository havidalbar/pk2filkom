@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
<nav class="navbar nav-home nav-bg-kuning navbar-expand-md navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{asset('img/bg-section/lsimaba2@4x.svg')}}" class="imgCover">
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
<div class="jumbotron jumbotron-fluid bg-teman-simaba teman-mahasiswa">
    <div class="container d-flex align-items-center">
        <div class="akademik-intro">
            <img src="{{asset('img/teman-simaba/mahasiswa/infomahasiswa.png')}}" class="img-akademik-text">
            <p class="intro-text">
                Ingin tahu lebih banyak tentang kegiatan di FILKOM? Atau ingin menilik lebih dalam informasi-informasi
                terkait kemahasiswaan? Laman di bawah ini menyediakan informasi terkait birokrasi dan advokasi mahasiswa
                baru di FILKOM UB! Silakan dicek!
            </p>
        </div>
    </div>
</div>
<div class="bg-detail-akademik">
    <div class="container">
        <!-- Kanal Informasi -->
        <div class="sub-akademik">
            <div class="sub-title text-right">
                Yuk, simak beberapa kanal informasi yang dapat kamu hubungi!
            </div>
            <div class="garis-sub-title float-right"></div>
            <div class="sub-kurikulum mt-5">
                <ul class="nav nav-tabs justify-content-center align-items-center" id="tab-kurikulum" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="bem-tab" data-toggle="tab" href="#bem" role="tab"
                            aria-controls="bem" aria-selected="true">bem filkom ub</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="hmif-tab" data-toggle="tab" href="#hmif" role="tab" aria-controls="hmif"
                            aria-selected="false">hmif</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="kbmsi-tab" data-toggle="tab" href="#kbmsi" role="tab"
                            aria-controls="kbmsi" aria-selected="false">kbmsi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="himatekkom-tab" data-toggle="tab" href="#himatekkom" role="tab"
                            aria-controls="himatekkom" aria-selected="false">himatekkom</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="kbmpti-tab" data-toggle="tab" href="#kbmpti" role="tab"
                            aria-controls="kbmpti" aria-selected="false">kbmpti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="kbmti-tab" data-toggle="tab" href="#kbmti" role="tab"
                            aria-controls="kbmti" aria-selected="false">kbmti</a>
                    </li>
                </ul>
                <div class="tab-content" id="tab-kurikulum">
                    <div class="tab-pane fade show active" id="bem" role="tabpanel" aria-labelledby="bem-tab">
                        <div class="d-flex justify-content-center sub-kanal">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-5 d-flex align-items-center justify-content-center">
                                        <img src="{{asset('img/teman-simaba/mahasiswa/bem.png')}}" class="kanal-img">
                                    </div>
                                    <div class="col-md-7 d-flex flex-column align-items-center justify-content-center">
                                        <div class="kanal-title">Kanal Informasi BEM FILKOM UB</div>
                                        <div class="kanal-web">
                                            <a href="http://bemfilkom.ub.ac.id" target="_blank">
                                                Web: bemfilkom.ub.ac.id
                                            </a>
                                        </div>
                                        <div class="kanal-line">LINE: @bemfilkomub</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="hmif" role="tabpanel" aria-labelledby="hmif-tab">
                        <div class="d-flex justify-content-center sub-kanal">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                                        <div>
                                            <img src="{{asset('img/teman-simaba/mahasiswa/hmif.png')}}"
                                                class="kanal-img">
                                        </div>
                                    </div>
                                    <div class="col-md-8 d-flex flex-column align-items-center justify-content-center">
                                        <div class="kanal-title">Kanal Informasi HIMPUNAN PRODI TIF</div>
                                        <div class="kanal-web">
                                            <a href="http://hmif.filkom.ub.ac.id" target="_blank">
                                                Web: hmif.filkom.ub.ac.id
                                            </a>
                                        </div>
                                        <div class="kanal-line">LINE: @eyp8721k</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="kbmsi" role="tabpanel" aria-labelledby="kbmsi-tab">
                        <div class="d-flex justify-content-center sub-kanal">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                                        <div>
                                            <img src="{{asset('img/teman-simaba/mahasiswa/kbmsi.png')}}"
                                                class="kanal-img">
                                        </div>
                                    </div>
                                    <div class="col-md-8 d-flex flex-column align-items-center justify-content-center">
                                        <div class="kanal-title">Kanal Informasi HIMPUNAN PRODI SI</div>
                                        <div class="kanal-web">
                                            <a href="http://kbmsi.filkom.ub.ac.id" target="_blank">
                                                Web: kbmsi.filkom.ub.ac.id
                                            </a>
                                        </div>
                                        <div class="kanal-line">LINE: @kig7594u</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="himatekkom" role="tabpanel" aria-labelledby="himatekkom-tab">
                        <div class="d-flex justify-content-center sub-kanal">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                                        <div>
                                            <img src="{{asset('img/teman-simaba/mahasiswa/himatekkom.png')}}"
                                                class="kanal-img">
                                        </div>
                                    </div>
                                    <div class="col-md-8 d-flex flex-column align-items-center justify-content-center">
                                        <div class="kanal-title">Kanal Informasi HIMPUNAN PRODI TEKKOM</div>
                                        <div class="kanal-web">
                                            <a href="http://himatekkom.ub.ac.id" target="_blank">
                                                Web: himatekkom.ub.ac.id
                                            </a>
                                        </div>
                                        <div class="kanal-line">LINE: @slz1174b</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="kbmpti" role="tabpanel" aria-labelledby="kbmpti-tab">
                        <div class="d-flex justify-content-center sub-kanal">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                                        <div>
                                            <img src="{{asset('img/teman-simaba/mahasiswa/kbmpti.png')}}"
                                                class="kanal-img">
                                        </div>
                                    </div>
                                    <div class="col-md-8 d-flex flex-column align-items-center justify-content-center">
                                        <div class="kanal-title">Kanal Informasi HIMPUNAN PRODI PTI</div>
                                        <div class="kanal-web">
                                            <a href="http://kbmpti.filkom.ub.ac.id" target="_blank">
                                                Web: kbmpti.filkom.ub.ac.id
                                            </a>
                                        </div>
                                        <div class="kanal-line">LINE: @qyx2927t</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="kbmti" role="tabpanel" aria-labelledby="kbmti-tab">
                        <div class="d-flex justify-content-center sub-kanal">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                                        <div>
                                            <img src="{{asset('img/teman-simaba/mahasiswa/kbmti.png')}}"
                                                class="kanal-img">
                                        </div>
                                    </div>
                                    <div class="col-md-8 d-flex flex-column align-items-center justify-content-center">
                                        <div class="kanal-title">Kanal Informasi HIMPUNAN PRODI TI</div>
                                        <div class="kanal-web">
                                            Web: dalam pengembangan
                                        </div>
                                        <div class="kanal-line">LINE: @gve1281t</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Beasiswa -->
        <div class="sub-akademik">
            <div class="sub-title">
                INFO BEASISWA
            </div>
            <div class="garis-sub-title"></div>
            <div class="d-flex flex-column align-items-center sub-beasiswa">
                <div class="beasiswa-text">
                    Buat kamu yang sedang mencari beasiswa, silakan akses lama di bawah ini ya! Banyak sekali informasi
                    yang bisa membantu kamu untuk membidik beasiswa yang cocok buat kamu.
                </div>
                <a href="http://filkom.ub.ac.id/page/read/informasi-beasiswa/54db431dd1daa1" target="_blank">
                    <div class="beasiswa-link">
                        Info beasiswa
                    </div>
                </a>
            </div>
        </div>
        <!-- SKM BUAT APA -->
        <div class="sub-akademik">
            <div class="text-right sub-title">
                SKM, BUAT APA SIH?
            </div>
            <div class="float-right garis-sub-title"></div>
            <div class="row sub-skm align-items-center text-left">
                <div class="col-md-3">
                    <img src="{{asset('img/teman-simaba/mahasiswa/skm.png')}}" class="mx-auto d-block img-skm">
                </div>
                <div class="col-md-9">
                    <div class="skm-text">
                        SKM atau Satuan Kegiatan Mahasiswa adalah sistem yang merekam aktivitas mahasiswa dan standar
                        minimal alumni mahasiswa yang juga bisa menjadi CV ( Curriculum Vitae) mahasiswa selama
                        menjadi mahasiswa Universitas Brawijaya <span class="bold-white">untuk dilampirkan pada saat
                            ujian skripsi dan
                            menjadi salah satu syaratnya lho!</span> Jadi kamu harus mulai mencari poin skm dari awal
                        masuk
                        kuliah yaa!
                    </div>
                </div>
            </div>            
            <div class="row sub-skm sub-poin align-items-center text-left">
                <div class="col-md-3">
                    <img src="{{asset('img/teman-simaba/mahasiswa/poin.png')}}" class="mx-auto d-block img-skm">
                </div>
                <div class="col-md-9 order-first">
                    <div class="skm-text">
                        <h1 class="skm-title">POIN SKM</h1>
                        <div class="skm-list">
                            <div class="nomor-text">1.</div>
                            <div class="text">Mahasiswa SAP (Seleksi Alih Program) Minimal poin 200</div>
                        </div>
                        <div class="skm-list">
                            <div class="nomor-text">2.</div>
                            <div class="text">Mahasiswa yang lulus tahun 2019 minimal poin 300</div>
                        </div>
                        <div class="skm-list">
                            <div class="nomor-text">3.</div>
                            <div class="text">Mahasiswa yang lulus tahun 2020 minimal poin 400</div>
                        </div>
                        <div class="skm-list">
                            <div class="nomor-text">4.</div>
                            <div class="text">Mahasiswa yang lulus tahun 2021 minimal poin 500</div>
                        </div>
                        <div class="skm-list">
                            <div class="nomor-text">5.</div>
                            <div class="text">Mahasiswa yang lulus tahun 2022 minimal poin 600</div>
                        </div>
                        <div class="skm-list">
                            <div class="nomor-text">6.</div>
                            <div class="text">Mahasiswa yang lulus tahun 2023 minimal poin 700</div>
                        </div>
                        <div class="skm-list">
                            <div class="nomor-text">7.</div>
                            <div class="text">Mahasiswa yang lulus tahun 2024 dan seterusnya minimal poin 800</div>
                        </div>
                        <div class="skm-text-file">Info lengkap nya bisa kamu lihat di panduan SKM pada <a href="{{asset('files/panduan-skm.pdf')}}" target="_blank">link ini</a></div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection