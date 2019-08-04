@extends ('layouts.template')
@section('title', 'TTS | FILKOM UB')

@section('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->
<div class="jumbotron jumbotron-fluid pk2-tts p-0 pb-5 container-fluid" style="margin-bottom: -1.5rem">
    <!-- Title -->
    <div class="title">
        <div class="container">
            <div class="row">
                <div class="titlePk2Maba m-auto multipleChoise tts">
                    <h1 class="titleSection">{{ $penugasan->judul }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- EndTitle -->
    <div class="container">
        <form method="POST" autocomplete="off" id="form-jawaban-tts">
            {{ csrf_field() }}
            <div class="row justify-content-center">
                <div class="col-auto" id="tts"></div>
                <input type="submit" value="Selesai" class="button-submit-tts">
                <div class="row mt-5" id="tts-soal"></div>
            </div>
        </form>
    </div>
    <div class="fixed-timer d-flex flex-column align-items-center">
        <div class="container-timer">
            <div class="sisa-waktu">Sisa Waktu</div>
            <div class="garis-sisa-waktu"></div>
            <div class="d-flex flex-row">
                <div class="col-timer">
                    <div class="jam"></div>
                    <div>Jam</div>
                </div>
                <div class="col-timer">
                    <div class="menit"></div>
                    <div>Menit</div>
                </div>
                <div class="col-timer">
                    <div class="detik"></div>
                    <div>Detik</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="prosesSimpan">
    <i class="fas fa-spinner-third fa-spin"></i>
    <span></span>
</div>
<script>
    let dataTts = {"menurun": {!! $menuruns !!}, "mendatar": {!! $mendatars !!}};
    let submitUrl = `{{ route('api-submit-tts', ['slug' => $penugasan->slug]) }}`;
    let token = `{{ $jwt }}`;
</script>
<script>
    window.onload = function(e) {
        var diffTime = {{ $sisaWaktu }} % (24 * 60 * 60);
        var duration = moment.duration(diffTime * 1000, 'milliseconds');
        var interval = 1000;
        if (diffTime > 0) {
            setInterval(function() {
                if (duration > 0) {
                    duration = moment.duration(duration.asMilliseconds() - interval, 'milliseconds');
                    let h = Math.floor(duration / (60 * 60 * 1000));
                    let m = Math.floor(duration / 60000 % 60);
                    let s = Math.floor(duration % 60000) / 1000;

                    h = $.trim(h).length === 1 ? '0' + h : h;
                    m = $.trim(m).length === 1 ? '0' + m : m;
                    s = $.trim(s).length === 1 ? '0' + s : s;
                                                
                    $(".jam").text(h);
                    $(".menit").text(m);
                    $(".detik").text(s);
                } else {
                    $("#form-jawaban-tts").submit();
                }
            }, interval);
        }
    };
</script>
<script src="{{ asset('js/script_tts_terbaru.js') }}"></script>
@if (!$expired)
<script>
    $(document).ready(function () {
        setTimeout(submitTTS, 60 * 1000);
    });
</script>
@endif
<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection