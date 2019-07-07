@extends ('layouts.template')
@section('title', 'TTS | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->
<div class="jumbotron jumbotron-fluid pk2-dtBerita p-0 pb-5 container-fluid" style="margin-bottom: -1.5rem">
    <!-- Title -->
    <div class="title">
        <div class="row">
            <div class="titlePk2Maba m-auto multipleChoise">
                <h1 class="titleSection">Teka teki Silang</h1>
            </div>
        </div>
    </div>
    <!-- EndTitle -->
  <div class="container">
        <div class="row">
            <div class="col-md-6" id="tts">
            </div>
            <div class="col-md-6">
                <div class="tts-soal">
                    <h1>Menurun</h1> 
                        <ol>
                            <li data-noSoal="1">Website yang digunakan mahasiswa baru FILKOM selama menjalani PK2MABA & Startup Academy adalah</li>
                            <li data-noSoal="4">Bapak Tri Astoto merupakan ketua jurusan</li>
                            <li data-noSoal="5">Gedung B terletak di sebelah ... Gedung F</li>
                            <li data-noSoal="7">Gedung yang menjadi pusat kegiatan organisasi mahasiswa FILKOM adalah</li>
                            <li data-noSoal="8">Tahun berdirinya Fakultas Ilmu Komputer adalah</li>
                            <li data-noSoal="13">Program studi S1 di Fakultas Ilmu Komputer berjumlah</li>
                            <li data-noSoal="14">Akun resmi Instagram Fakultas Ilmu Komputer bernama</li>
                            <li data-noSoal="15">Nama dekan Fakultas Ilmu Komputer adalah ... Firdaus Mahmudy, S.Si, M.T.</li>
                            <li data-noSoal="16">Fakultas Ilmu Komputer ber-diesnatalis pada bulan</li>
                            <li data-noSoal="17">Teknologi Smart Class di FILKOM disebut dengan ...</li>
                            <li data-noSoal="19">Nama salah satu jaringan wifi yang terdapat di FILKOM adalah</li>
                        </ol>
                    <h1>Mendatar</h1> 
                        <ol>
                            <li data-noSoal="2">Fakultas Ilmu Komputer merupakan gabungan dua program studi pada dua fakultas berbeda, salah satu fakultas tersebut adalah</li>
                            <li data-noSoal="3">Gerbang yang berada paling dekat dengan FILKOM adalah</li>
                            <li data-noSoal="6">Edy Santoso, S.Si, M.Kom. merupakan nama wakil dekan III yang membidangi ...</li>
                            <li data-noSoal="9">Nama lama dari Fakultas Ilmu Komputer adalah</li>
                            <li data-noSoal="10">Ruangan yang terdapat pada gedung F lantai 7 adalah</li>
                            <li data-noSoal="11">Yang menjabat sebagai wakil dekan II Fakultas Ilmu Komputer adalah Bapak ...</li>
                            <li data-noSoal="12">Jumlah lantai gedung F adalah ...</li>
                            <li data-noSoal="18">Program studi termuda di FILKOM adalah</li>
                            <li data-noSoal="20">Salah satu nama lapangan yang terdapat di FILKOM adalah lapangan ...</li>
                        </ol>
                    </div>
            </div>
        </div>
  </div>
</div>
  
<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection