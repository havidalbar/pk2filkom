@extends ('layouts.template')
@section('title', 'Berita | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/id.js"></script>
<div class="jumbotron jumbotron-fluid pk2-dtBerita pt-0">
    <!-- Title -->
    <div class="title">
        <div class="container">
            <div class="row">
                <div class="titlePk2Maba m-auto detailBerita">
                    <h1 class="titleSection">Berita</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- EndTitle -->
    <section class="center slider py-5">
        @foreach ($beritas as $berita_top)
        <div>
            <a href="{{ route('berita.show', ['slug' => $berita_top->slug]) }}">
                <img src="{{ $berita_top->thumbnail }}" style="height: 200px; width: 200px">
            </a>
        </div>
        @endforeach
    </section>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="infoBerita mx-auto">
                <h1 class="titleBerita">{{ $berita->judul }}</h1>
                <span class="creatAt"><i class="far fa-calendar-alt"></i> Dipublikasikan pada :
                    {{ date($berita->created_at) }}</span>
            </div>
        </div>
    </div>
    @foreach ($berita->sub as $sub)
    <div class="row">
        <div class="col-md-6 px-md-0 vdBerita">
            <div class="zoom">
                <img src="{{ $sub->thumbnail }}" />
            </div>
        </div>
        <div class="col-md-6 vdBerita gradientBerita">
            {!! $sub->deskripsi !!}
        </div>
    </div>
    @endforeach
    <div class="container">

        @foreach ($berita->komentar as $komentar)
        <div class="media commentBerita border py-2 px-3">
            <img src="https://via.placeholder.com/64" class="img commentImg align-self-start mr-3" />
            <div class="media-body">
                <div class="media-title">
                    <p>
                        <strong>{{ $komentar->username_admin ?? $komentar->pengirim_mahasiswa->nama ?? '' }}</strong>
                        <span class="sub-title" style="display: block">{{ $komentar->created_at }}</span>
                    </p>
                </div>
                <p>{{ $komentar->isi }}</p>
            </div>
            <div class="input-group-append">
                <button class="btn btn-comment">Balas</button>
            </div>
        </div>
        @endforeach

        <div class="commentEvent">
            <h1>Tambahkan Komentar</h1>
        </div>

        <form action="{{ route('berita.komentar.post', ['slug' => $berita->slug]) }}" method="POST">
            @csrf
            <div class="input-group border mb-3">
                <input type="text" class="form-control border-0" placeholder="Tuliskan Komentar anda" name="isi">
                <div class="input-group-append">
                    <button class="btn btn-comment" type="submit" id="button-addon2">Kirim</button>
                </div>
            </div>
        </form>

    </div>
</div>

<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection