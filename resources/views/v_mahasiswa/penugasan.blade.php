@extends ('layouts.template')
@section('title', 'Berita | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->

<div class="jumbotron jumbotron-fluid bg-penugasan p-0 d-flex align-items-center justify-content-center">
  <!-- Title -->
  <div class="title">
    <div class="container">
        <div class="row">
            <div class="titlePk2Maba m-auto multipleChoise">
                <h1 class="titleSection">penuggasan</h1>
            </div>
        </div>
        <div class="row justify-content-md-center alitem">
            <div class="col-md-2">
              <a href="/Twibbon">
                <div class="item-penugasan">Twibbon</div>
              </a>
            </div>
            <div class="col-md-2">
              <a href="/Buku-Panduan">
                <div class="item-penugasan">Buku Panduan</div>
              </a>
            </div>
            <div class="col-md-2">
              <a href="/Cerita-Tentang-Aku">
                <div class="item-penugasan">Cerita Tentang Aku</div>
              </a>
            </div>
            <div class="col-md-2">
              <a href="/Teka-Teki-siMaba">
                <div class="item-penugasan">Teka Teki siMABA</div>
              </a>
            </div>
            <div class="col-md-2">
                <a href="/FILKOM-Mengabdi">
                  <div class="item-penugasan">FILKOM Mengabdi</div>
                </a>
            </div>
            <div class="col-md-2">
              <a href="/Serial-FILKOM">
                <div class="item-penugasan">Serial FILKOM</div>
              </a>
            </div>
            <div class="col-md-2">
                <a href="/Ngobrol-Inspiratif">
                  <div class="item-penugasan">Ngobrol Inspiratif</div>
                </a>
            </div>
            <div class="col-md-2">
              <a href="/PKM">
                <div class="item-penugasan">PKM</div>
              </a>
            </div>
            <div class="col-md-2">
              <a href="/Kuis-OH">
                <div class="item-penugasan">Kuis OH</div>
              </a>
            </div>
            <div class="col-md-2">
              <a href="/Cobain-Organisasi">
                <div class="item-penugasan">Cobain Organisasi</div>
              </a>
            </div>
        </div>
    </div>
  </div>
  <!-- EndTitle -->
</div>

<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection
