@extends ('layouts.template')
@section('title', 'TTS | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->
<div class="jumbotron jumbotron-fluid pk2-dtBerita p-0 pb-5 container-fluid" style="margin-bottom: -1.5rem">
    <!-- Title -->
    <div class="title">
        <div class="container">
            <div class="row">
                <div class="titlePk2Maba m-auto multipleChoise tts">
                    <h1 class="titleSection">Teka teki Silang</h1>
                </div>
            </div>
            <ol>
                <b><li>Periode: 7 - 10 Agustus 2019.</li></b>
                <li>Disarankan untuk membaca informasi tentang FILKOM terlebih dahulu.</li>
                <li>Tidak boleh melakukan kecurangan dalam bentuk apapun.</li>
                <li>Soal TTS berjumlah 20 buah dengan waktu pengerjaan 25 menit, terhitung pada saat menekan tombol ‘MULAI’. Disediakan timer yang memperlihatkan waktu pengerjaan TTS.</li>
                <li>Soal akan muncul secara bersamaan. Utamakan untuk menjawab soal yang mudah dan berlanjut ke soal yang lebih sulit.</li>
                <li>Pengisian dilakukan pada kotak secara langsung dan tidak ada pemberitahuan benar atau salah.</li>
                <li>Dapat melakukan perubahan terhadap jawaban yang telah diisikan selama belum menekan tombol ‘SELESAI’.</li>
                <li>Untuk mengakhiri TTS, dapat dilakukan dengan menekan tombol ‘SELESAI’. Jawaban yang telah diisikan tidak dapat diubah.</li>
                <li>Jika waktu pengerjaan telah habis, secara otomatis jawaban yang terkumpul merupakan jawaban yang terakhir diisikan.</li>
                <li>Nilai tidak ditampilkan secara langsung, melainkan akan ditampilkan pada <i>dashboard</i> penilaian.</li>
            </ol>
        </div>
    </div>
    <!-- EndTitle -->
  <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto" id="tts"></div>
            <div class="row mt-5" id="tts-soal">
            </div>
        </div>
  </div>
</div>
  
<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection