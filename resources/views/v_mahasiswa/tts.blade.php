@extends ('layouts.template')
@section('title', 'TTS | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->
<div class="jumbotron jumbotron-fluid pk2-dtBerita p-0 pb-5 container-fluid" style="margin-bottom: -1.5rem">
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
        <div class="row justify-content-center">
            <div class="col-auto" id="tts"></div>
            <div class="row mt-5" id="tts-soal">
            </div>
        </div>
    </div>
</div>
<script>
    let dataTts = {"menurun": {!! $menuruns !!}, "mendatar": {!! $mendatars !!}};
</script>
<script src="{{ asset('js/script_tts.js') }}"></script>
<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection