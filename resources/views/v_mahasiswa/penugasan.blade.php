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
                @if ($penugasan->batas_waktu || $penugasan->jenis == 5)
                <div class="accordion" id="accordionSoal">
                    <div class="card">
                        <div class="card-header" id="heading{{$penugasan->id}}">
                            <div class="collapsed item-penugasan" data-toggle="collapse"
                                data-target="#collapse{{$penugasan->id}}" aria-expanded="true"
                                aria-controls="collapse{{$penugasan->id}}">
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
                        </div>
                        <div id="collapse{{$penugasan->id}}" class="collapse"
                            aria-labelledby="heading{{$penugasan->id}}" data-parent="#accordionSoal">
                            <div class="card-body">
                                <div>{!! $penugasan->deskripsi !!}</div>
                                @if ($penugasan->jenis != 5)
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-submit" href="{{ $penugasan->link_view }}">MULAI</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <a href="{{ $penugasan->link_view }}">
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
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection