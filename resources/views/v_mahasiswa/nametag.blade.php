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
                        <?php
                        $imgNametag = Image::make($nametag);
                        // $imgBagholder = Image::make($bagholder);
                        $imgNametag->encode('png');
                        // $imgBagholder->encode('png');
                        $type = 'png';
                        $imgNametagEncode = 'data:image/' . $type . ';base64,' . base64_encode($imgNametag);
                        // $imgBagholderEncode = 'data:image/' . $type . ';base64,' . base64_encode($imgBagholder);
                        ?>
                        <img src="{!! $imgNametagEncode !!}" class="img-nametag">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-download" onclick="window.location.href='{!! $imgNametagEncode !!}'">Download Nametag</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="title-text">Ketentuan Nametag</p>
                        <div class="list-text">
                            <div class="d-flex flex-row mb-2">
                                <div class="nomor-text">1.</div>
                                <div class="text">Unduh template nametag & gantungan tas.</div>
                            </div>
                            <div class="d-flex flex-row mb-2">
                                <div class="nomor-text">2.</div>
                                <div class="text">Nametag dicetak berwarna di kertas HVS (tidak perlu merubah ukuran).
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-2">
                                <div class="nomor-text">3.</div>
                                <div class="text">Gunting dan lipat nametag.</div>
                            </div>
                            <div class="d-flex flex-row mb-2">
                                <div class="nomor-text">4.</div>
                                <div class="text">Tempel foto formal dengan ukuran 3x4.</div>
                            </div>
                            <div class="d-flex flex-row mb-2">
                                <div class="nomor-text">5.</div>
                                <div class="text">Masukkan ke dalam nametag holder mika ukuran B2, dengan bagian depan
                                    merupakan nametag dan bagian belakang merupakan kartu kendali.</div>
                            </div>
                            <div class="d-flex flex-row mb-2">
                                <div class="nomor-text">6.</div>
                                <div class="text">Gunakan tali berwarna biru untuk nametag tersebut.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail-bagholder">
                <div class="row">
                    <div class="col-md-6">
                        <p class="title-text">Preview Bagholder</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{asset('img/bagholder/BAGHOLDER TIF 40.jpg')}}">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-download">Download Bagholder</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="title-text">Ketentuan Bagholder</p>
                        <div class="list-text">
                            <div class="d-flex flex-row mb-2">
                                <div class="nomor-text">1.</div>
                                <div class="text">Gantungan tas dicetak berwarna di kertas HVS (tidak perlu merubah
                                    ukuran).</div>
                            </div>
                            <div class="d-flex flex-row mb-2">
                                <div class="nomor-text">2.</div>
                                <div class="text">Gunting dan lipat gantungan tas, lalu dilaminasi press.</div>
                            </div>
                            <div class="d-flex flex-row mb-2">
                                <div class="nomor-text">3.</div>
                                <div class="text">Gunakan pita kecil berwarna biru dan ikatkan gantungan tersebut di
                                    tas.</div>
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
