@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
@include('layouts.header')
<div class="jumbotron jumbotron-fluid bg-teman-simaba d-flex flex-column align-items-center justify-content-center">
    <div class="container">
        <div class="title-section">
            <div class="title-teman-simaba">Teman Simaba</div>
            <div class="garis-teman-simaba"></div>
            <div class="text-teman-simaba">TEMAN SIMABA hadir untuk menemani dan mendampingimu membedah lebih dalam tentang FILKOM. Penasaran?
                Untuk menjawab rasa penasaranmu, yuk cari tahu informasi yang ada di TEMAN SIMABA!
            </div>
        </div>
        <div class="teman-simaba-card-section">
            <div class="row">
                <div class="col-md-3 col-sm-12 d-flex justify-content-center">
                    <div class="teman-simaba-card">
                        <img src="{{asset('img/teman-simaba/info-akademik-card.png')}}">
                        <div class="overlay">
                            <h2>Info Akademik</h2>
                            <div class="h-100 d-flex align-items-center justify-content-center">
                            <a href="{{ route('teman-simaba-akademik') }}" class="info">Lihat Info</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 d-flex justify-content-center">
                    <div class="teman-simaba-card">
                        <img src="{{asset('img/teman-simaba/info-kampus-card.png')}}">
                        <div class="overlay">
                            <h2>Info Kampus</h2>
                            <div class="h-100 d-flex align-items-center justify-content-center">
                                <a href="{{ route('teman-simaba-kampus') }}" class="info">Lihat Info</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 d-flex justify-content-center">
                    <div class="teman-simaba-card">
                        <img src="{{asset('img/teman-simaba/info-filkom-card.png')}}">
                        <div class="overlay">
                            <h2>Info Filkom</h2>
                            <div class="h-100 d-flex align-items-center justify-content-center">
                                <a href="/info-filkom" class="info">Lihat Info</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 d-flex justify-content-center">
                    <div class="teman-simaba-card">
                        <img src="{{asset('img/teman-simaba/info-mahasiswa-card.png')}}">
                        <div class="overlay">
                            <h2>Info Mahasiswa</h2>
                            <div class="h-100 d-flex align-items-center justify-content-center">
                                <a href="/info-mahasiswa" class="info">Lihat Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
