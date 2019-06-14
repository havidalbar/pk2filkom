@extends ('layouts.template')
@section('title', 'Berita | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->

<div class="jumbotron jumbotron-fluid pk2-dtBerita pt-0">    
  <!-- Title -->
  <div class="title">
    <div class="container">
        <div class="row">
            <div class="titlePk2Maba m-auto detailBerita">
                <h1 class="titleSection">Berita</h1>
            </div>
        </div>
    </div>
  </div>
  <!-- EndTitle -->
  <section class="center slider py-5">
    <div>
      <img src="{{asset('img/berita/kartini.png')}}">
    </div>
    <div>
      <img src="{{asset('img/berita/kartini.png')}}">
    </div>
    <div>
      <img src="{{asset('img/berita/kartini.png')}}">
    </div>
    <div>
      <img src="{{asset('img/berita/kartini.png')}}">
    </div>
    <div>
      <img src="{{asset('img/berita/kartini.png')}}">
    </div>
    <div>
      <img src="{{asset('img/berita/kartini.png')}}">
    </div>
    <div>
      <img src="{{asset('img/berita/kartini.png')}}">
    </div>
    <div>
      <img src="{{asset('img/berita/kartini.png')}}">
    </div>
    <div>
      <img src="{{asset('img/berita/kartini.png')}}">
    </div>
  </section>
</div>
<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="infoBerita mx-auto">
          <h1 class="titleBerita">Artibut dan barang bawaan pkm</h1>
          <span class="creatAt"><i class="far fa-calendar-alt"></i> Dipublikasikan pada : 2019-11-19</span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 px-md-0 vdBerita">
      <div class="zoom">
        <img src="{{asset('img/berita/test.png')}}"/>
      </div>
    </div>
    <div class="col-md-6 vdBerita gradientBerita"> 
      Content Dari WYGSIWYG.
    </div>
  </div>
  <div class="container">
    <div class="media commentBerita border py-2 px-3">
      <img src="https://via.placeholder.com/64" class="img commentImg align-self-start mr-3"/>
        <div class="media-body">
          <div class="media-title">
            <p>
            <strong>Maniruzzaman Akash</strong>
            <span class="sub-title" style="display: block">May 25, 2019 at 5:20 am</span>
            </p>
          </div>
          <p>Kak rok nya boleh span nggak?</p>    
        </div>
        <div class="input-group-append">
            <button class="btn btn-comment">Balas</button>
        </div>
    </div>
    
    <div class="commentEvent">
      <h1>Tambahkan Komentar</h1>
    </div>

    <div class="input-group border mb-3">
      <input type="text" class="form-control border-0" placeholder="Tuliskan Komentar anda">
      <div class="input-group-append">
        <button class="btn btn-comment" type="button" id="button-addon2">Kirim</button>
      </div>
    </div>
  
  </div>
</div>
  
<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection