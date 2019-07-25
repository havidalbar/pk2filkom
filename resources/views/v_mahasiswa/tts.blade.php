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
            <div class="d-flex justify-content-center">
                <div class="detail-tugas">
                    {!! $penugasan->deskripsi !!}
                </div>
            </div>
        </div>
    </div>
    <!-- EndTitle -->
    <div class="container">
        <form method="post">
            {{ csrf_field() }}
            <div class="row justify-content-center">
                <div class="col-auto" id="tts"></div>
                <input type="submit" value="Submit" class="button-submit-tts">
                <div class="row mt-5" id="tts-soal"></div>
            </div>
        </form>
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