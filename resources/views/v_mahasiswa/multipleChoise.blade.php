@extends ('layouts.template')
@section('title', 'Berita | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->

<div class="jumbotron jumbotron-fluid pk2-dtBerita postTest p-0">   
<div class="container-fluid">
    <!-- Title -->
    <div class="title titlePostTest">
      <div class="container">
          <div class="row">
              <div class="titlePk2Maba m-auto multipleChoise">
                  <h1 class="titleSection">post test</h1>
              </div>
          </div>
          <ul>
            <li>Persiapkan dirimu sebaik mungkin.</li>
            <li>Jika sudah siap, kamu bisa langsung menekan tombol ‘MULAI’ yang telah tersedia.</li>
            <li>Pahami soal dan mulailah menandai pilihan jawaban yang menurutmu benar. Kamu bisa menjawabnya secara acak. Kamu bisa melewati soal yang kamu rasa sulit, untuk melanjutkannya ke soal yang lebih mudah terlebih dahulu. Tapi pastikan tidak ada soal yang tidak terjawab ya.</li>
            <li>Kamu bisa mengubah jawaban yang kamu rasa belum tepat selama kamu belum menekan tombol ‘SELESAI’ dan waktu masih tersisa.</li>
            <li>Barulah jika kamu sudah yakin, kamu bisa menekan tombol ‘SELESAI’ untuk mengakhiri.</li>
          </ul>
      </div>
    </div>
    <!-- EndTitle -->
    <div class="container">
      <form action="" method="POST" id="pilgan">
          <div class="question">
              <p><strong>1 . </strong>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut suscipit facere ex incidunt labore eius.</p>
              <label>
                  <input type="radio" name="1" value="a"> Lorem ipsum dolor sit amet.</label>
              <label>
                  <input type="radio" name="1" value="b"> Lorem ipsum dolor sit amet.</label>
              <label>
                  <input type="radio" name="1" value="c"> Lorem ipsum dolor sit amet.</label>
              <label>
                  <input type="radio" name="1" value="d"> Lorem ipsum dolor sit amet.</label>
          </div>
          <div class="question">
              <p><strong>2 . </strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, labore. Temporibus veritatis commodi aperiam eaque.</p>
              <label>
                  <input type="radio" name="2" value="a"> Lorem ipsum dolor sit amet.</label>
              <label>
                  <input type="radio" name="2" value="b"> Lorem ipsum dolor sit amet.</label>
              <label>
                  <input type="radio" name="2" value="c"> Lorem ipsum dolor sit amet.</label>
              <label>
                  <input type="radio" name="2" value="d"> Lorem ipsum dolor sit amet.</label>
          </div>
          <button type="button" id="mulaiQuiz" class="kirimJwb align-self-center"><span>Mulai</span></button>
      </form>
    </div>
  </div>
  <div id="prosesSimpan" class="waktuPilgan">
      <p>
          siswa waktu
      </p>
  </div>
</div>
  
<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection