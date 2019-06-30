@extends ('layouts.template')
@section('title', 'Berita | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->

<div class="jumbotron jumbotron-fluid pk2-dtBerita p-0 mb-4" style="margin-bottom: -1.5rem !important">    
  <!-- Title -->
  <div class="title">
    <div class="container">
        <div class="row">
            <div class="titlePk2Maba m-auto multipleChoise">
                <h1 class="titleSection">penuggasan</h1>
            </div>
        </div>
        
        <div class="row justify-content-md-center">
            <div class="col-md-2">
            Twibbom
            </div>
            <div class="col-md-2">
            Buku Panduan
            </div>
            <div class="col-md-2">
            Video Profile
            </div>
            <div class="col-md-2">
            TTS
            </div>
            <div class="col-md-2">
            Pengabdian Masyarakat
            </div>
            <div class="col-md-2">
            Filkom TV
            </div>
            <div class="col-md-2">
            Share Our Moment
            </div>
            <div class="col-md-2">
            Proposal PKM
            </div>
            <div class="col-md-2">
            Post Test OH
            </div>
            <div class="col-md-2">
            Trial LSO
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