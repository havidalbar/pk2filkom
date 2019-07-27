@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->

<div class="jumbotron jumbotron-fluid bg-penugasan">
    <div class="container">
        <div class="title-penugasan">Penugasan</div>
        <div class="garis-penugasan"></div>
        <div class="d-flex align-items-center justify-content-center">
            <div class="list-penugasan">
                @foreach ($penugasans as $penugasan)
                <a href="{{ route('mahasiswa.penugasan.view-jawaban', ['slug' => $penugasan->slug]) }}">
                    <div class="item-penugasan">
                        <div class="nama-tugas">{{ $penugasan->judul }}</div>
                        <div class="row">
                            <div class="col-md-4">
                                {{ ($penugasan->soal_count ? $penugasan->soal_count . ' Soal ' : '') . $penugasan->jenis_text }}
                            </div>
                            <div class="col-md-4">Mulai :
                                {{ date('Y-m-d H:i:s', strtotime("{$penugasan->waktu_mulai} + 7 hour")) }}
                            </div>
                            <div class="col-md-4">Berakhir :
                                {{ date('Y-m-d H:i:s', strtotime("{$penugasan->waktu_akhir} + 7 hour")) }}</div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection