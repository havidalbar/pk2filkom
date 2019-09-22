@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->
@section('js')
<script type="text/javascript" src="{{ asset('js/script-pilgan.js') }}"></script>
@endsection

<div class="jumbotron jumbotron-fluid bg-pilgan">
    <div class="container-pilgan">
        <h1 class="titleKumpulVideo">Pilihan Ganda</h1>
        <div class="garisKumpulVideo"></div>
        <div class="row container-soal">
            <div class="col-md-8">
                <div class="col-md-12 container-pertanyaan-navigasi">
                    <div class="row">
                        <div class="col-md-1 container-icon-soal">
                            <i class="fas fa-arrow-alt-left fa-lg icon-soal"></i>
                        </div>
                        <div class="col-md-10">
                            <form action="">
                            <div class="nomor-soal">SOAL 23</div>
                            <div class="text-soal">Siapa nama lengkap Eka?</div>
                            <div class="container-pilihan">
                                <input type="radio" name="group1" />
                                <input type="radio" name="group1" />
                                <input type="radio" name="group1" />
                            </div>
                            </form>
                        </div>
                        <div class="col-md-1 container-icon-soal">
                            <i class="fas fa-arrow-alt-right fa-lg icon-soal"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-12 container-pertanyaan-navigasi">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="nomor-navigasi">1</div>
                        <div class="nomor-navigasi">2</div>
                        <div class="nomor-navigasi">3</div>
                        <div class="nomor-navigasi">4</div>
                        <div class="nomor-navigasi">5</div>
                        <div class="nomor-navigasi">6</div>
                        <div class="nomor-navigasi">7</div>
                        <div class="nomor-navigasi">8</div>
                        <div class="nomor-navigasi">9</div>
                        <div class="nomor-navigasi">10</div>
                        <div class="nomor-navigasi">11</div>
                        <div class="nomor-navigasi">11</div>
                        <div class="nomor-navigasi">11</div>
                        <div class="nomor-navigasi">11</div>
                        <div class="nomor-navigasi">11</div>
                        <div class="nomor-navigasi">11</div>
                        <div class="nomor-navigasi">11</div>
                        <div class="nomor-navigasi">11</div>
                        <div class="nomor-navigasi">11</div>
                        <div class="nomor-navigasi">11</div>
                        <div class="nomor-navigasi">11</div>
                        <div class="nomor-navigasi">11</div>
                        <div class="nomor-navigasi">11</div>
                        <div class="nomor-navigasi">11</div>
                        <div class="nomor-navigasi">11</div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>

<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection