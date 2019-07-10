@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->

<div class="jumbotron jumbotron-fluid align-items-center justify-content-center d-flex bg-qr-code">
    <div class="container">
        <div class="cardQR">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <img class="mx-auto d-block imgQR"
                        src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(400)->generate(encrypt(session('nim')))) }} ">
                </div>
                <div class="col-md-7">
                    <p class="txtQR">
                        Tunjukkan QR Code sebagai tanda presensi Open House!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection