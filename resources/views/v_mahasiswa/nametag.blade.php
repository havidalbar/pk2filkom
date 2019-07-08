@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->
<div class="jumbotron jumbotron-fluid bg-nametag">
    <div class="container">
        <h1 class="title-nametag">Nametag & Bagholder</h1>
        <div class="garis-nametag"></div>
        <div class="container bg-isi-nametag">
            <div class="detail-nametag">
                <div class="row">
                    <div class="col-md-6">
                        <p class="title-text">Preview Nametag</p>
                        <img src="{{asset('img/nametag/175150201111075.jpg')}}" class="img-nametag">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-download">Download Nametag</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="title-text">Ketentuan Nametag</p>
                        <div class="list-text">
                            <div class="d-flex flex-row mb-2">
                                <div class="nomor-text">1.</div>
                                <div class="text">
                                    Pertama, kamu dapat mulai untuk berpikir apa saja yang sekiranya akan
                                    kamu sampaikan pada video ‘Cerita Tentang Aku’.
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-2">
                                <div class="nomor-text">2.</div>
                                <div class="text">
                                    Kedua, kamu dapat mulai untuk berpikir apa saja yang sekiranya akan
                                    kamu sampaikan pada video ‘Cerita Tentang Aku’.
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-2">
                                <div class="nomor-text">3.</div>
                                <div class="text">
                                    Ketiga, kamu dapat mulai untuk berpikir apa saja yang sekiranya akan
                                    kamu sampaikan pada video ‘Cerita Tentang Aku’.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail-bagholder">
                <div class="row">                    
                    <div class="col-md-6">
                        <p class="title-text">Preview Bagholder</p>
                        <img src="{{asset('img/nametag/175150201111075.jpg')}}" class="img-nametag">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-download">Download Bagholder</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="title-text">Ketentuan Bagholder</p>
                        <div class="list-text">
                            <div class="d-flex flex-row mb-2">
                                <div class="nomor-text">1.</div>
                                <div class="text">
                                    Pertama, kamu dapat mulai untuk berpikir apa saja yang sekiranya akan
                                    kamu sampaikan pada video ‘Cerita Tentang Aku’.
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-2">
                                <div class="nomor-text">2.</div>
                                <div class="text">
                                    Kedua, kamu dapat mulai untuk berpikir apa saja yang sekiranya akan
                                    kamu sampaikan pada video ‘Cerita Tentang Aku’.
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-2">
                                <div class="nomor-text">3.</div>
                                <div class="text">
                                    Ketiga, kamu dapat mulai untuk berpikir apa saja yang sekiranya akan
                                    kamu sampaikan pada video ‘Cerita Tentang Aku’.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
@include('layouts.footer')
<!-- endFooter -->
@endsection