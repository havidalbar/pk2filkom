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
    <section class="center slider responsive py-5">
        @for ($i = 0; $i < 3; $i++) @foreach ($beritas as $berita_top) <div>
            <div class="hovereffect-berita">
                <img src="{{ $berita_top->thumbnail }}" style="height: 200px; width: 200px">
                <div class="overlay">
                    <h2>Selamat Hari Kartini 2019</h2>
                    <div class="h-100 d-flex align-items-center justify-content-center">
                        <a href="{{ route('berita.show', ['slug' => $berita_top->slug]) }}" class="info">Lihat
                            Berita</a>
                    </div>
                </div>
            </div>
</div>
@endforeach
@endfor
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

        <div class="commentEventTitle commentEvent">
            <span>{{ count($berita->komentar) }}</span>
            <h1>Komentar</h1>
        </div>

        @foreach ($berita->komentar as $index => $komentar)
        @if (!$komentar->komentar_ke)
        <div class="media commentBerita py-2 px-3">
            <img src="https://via.placeholder.com/64" class="img commentImg align-self-start mr-3" />
            <div class="media-body">
                <div class="media-title">
                    <p>
                        {{$komentar->id}}
                        @if ($komentar->username_admin)
                        <strong>{{ $komentar->username_admin . ' | Admin' }}</strong>
                        @else
                        <strong>{{ $komentar->pengirim_mahasiswa->nama ?? '' }}</strong>
                        @endif
                        <span class="sub-title" style="display: block">{{ $komentar->created_at }}</span>
                    </p>
                </div>
                <p id="dComment-{{$index}}">{{ $komentar->isi }}</p>
            </div>
            @if (session('username') || session('nim'))
            <div class="input-group-append actionComment" id="actionComment-{{$index}}">
                @if ((session('username') && session('username') == $komentar->username_admin)
                || (session('nim') && session('nim') == $komentar->nim_mahasiswa))
                <button class="btn btn-comment buttonEdit" id="buttonEdit-{{$index}}">Edit</button>
                <span>|</span>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#actionComment-{{$index}}').on('click', '#buttonEdit-{{$index}}', function () {                            
                            let parentEdit = $(this).parent().parent().find('#dComment-{{$index}}');
                            let form = $("<form/>", { action: "{{ route('berita.komentar.update', ['slug' => $berita->slug, $komentar->id]) }}", method:'POST', id: 'editComent-{{$index}}' });
                            let input = $('<input />', { 'type': 'text', 'name': 'editComent-{{$index}}', 'value': $('#dComment-{{$index}}').text() });
                            let method = $('<input />', { 'type': 'hidden', 'name': '_method', 'value': 'PUT' });
                            let token = $('<input />', { 'type': 'hidden', 'name': '_token', 'value': '{{ csrf_token() }}' });                            
                            
                            $(parentEdit).parent().append(form.append(token,method,input));
                            $(parentEdit).remove();
                            input.putEnd().on("focus", function () {
                                searchInput.putEnd();
                            });

                            let buttonNext = $(this).parent();
                            buttonNext.empty();

                            buttonNext.append(`
                            <button class="btn btn-comment" type="submit" form="editComent-{{$index}}">Kirim</button>
                                <span>|</span>
                            <button class="btn btn-comment" id="batalComment-{{$index}}">Batal</button>
                            `);
                        });
                        $('#actionComment-{{$index}}').on('click', '#batalComment-{{$index}}', function () {
                            let element = $(this).parent();
                            let parentEdit = $(this).parent().parent().find('#editComent-{{$index}}');

                            var input = $('<p />', { 'id': 'dComment-{{$index}}', 'text': "{{ $komentar->isi }}" });
                            $(parentEdit).parent().append(input);
                            $(parentEdit).remove();

                            element.empty();
                            element.append(`
                            <button class="btn btn-comment buttonEdit" id="buttonEdit-{{$index}}">Edit</button>
                                <span>|</span>
                            <button class="btn btn-comment" id="buttonBalas-{{$index}}">Balas</button>
                            `);
                        });
                        $('#actionComment-{{$index}}').on('click', '#buttonBalas-{{$index}}', function () {
                            let parentBalas = $(this).parent().parent();
                            // console.log(this);
                            // console.log(parentBalas);
                            // console.log((parentBalas.find('form#balasComent')));
                            $(this).replaceWith('<button class="btn btn-comment" id="buttonBatalBalas-{{$index}}">X</button>')
                            if (parentBalas.find('form#balasComent').length > 0) {
                                alert('form replay komentar sudah ada!')
                            } else {
                                let form = $("<form/>", { action: "{{ route('berita.komentar.reply', ['slug' => $berita->slug, $komentar->id]) }}", method:'POST', id: 'balasComent' });
                                let token = $('<input />', { 'type': 'hidden', 'name': '_token', 'value': '{{ csrf_token() }}' });
                                let balas = `
                                <div class="input-group border mb-3">
                                    <input type="text" class="form-control border-0" placeholder="Tuliskan Komentar Anda" name="isi">
                                    <div class="input-group-append">
                                        <button class="btn btn-comment" type="submit" id="button-addon2">Kirim</button>
                                    </div>
                                </div>`;
                                $(parentBalas).append(form.append(token,balas));
                            }
                        });
                        $('#actionComment-{{$index}}').on('click', '#buttonBatalBalas-{{$index}}', function () {

                            let hapusReplay = $(this).parent().parent().find('form#balasComent');
                            // console.log(hapusReplay)
                            $(hapusReplay).remove();
                            $(this).replaceWith('<button class="btn btn-comment" id="buttonBalas-{{$index}}">Balas</button>')
                        });
                    });
                </script>
                @endif
                <button class="btn btn-comment" id="buttonBalas-{{$index}}">Balas</button>
            </div>
            @endif
            {{-- Reply --}}
            @foreach ($berita->komentar as $reply)
            @if ($reply->komentar_ke == $komentar->id)
            <div class="media commentBerita replayComment py-2 px-3">
                <img src="https://via.placeholder.com/64" class="img commentImg align-self-start mr-3" />
                <div class="media-body">
                    <div class="media-title">
                        <p>         
                            {{$komentar->id}}                   
                            @if ($reply->username_admin)
                            <strong>{{ $reply->username_admin . ' | Admin' }}</strong>
                            @else
                            <strong>{{ $reply->pengirim_mahasiswa->nama ?? '' }}</strong>
                            @endif
                            <span class="sub-title" style="display: block">{{ $reply->created_at }}</span>
                        </p>
                    </div>
                    <p id="dComment">{{ $reply->isi }}</p>
                </div>
                @if (session('username') || session('nim'))
                <div class="input-group-append actionComment" id="actionComment">
                    @if ((session('username') && session('username') == $reply->username_admin)
                    || (session('nim') && session('nim') == $reply->nim_mahasiswa))
                    <button class="btn btn-comment buttonEdit" id="buttonEdit">Edit</button>
                    <span>|</span>
                    @endif
                    <button class="btn btn-comment" id="buttonBalas">Balas</button>
                </div>
                @endif
            </div>
            @endif
            @endforeach
        </div>
        @endif
        @endforeach

        <div class="commentEvent" style="margin-top: 30px">
            <h1>Tambahkan Komentar</h1>
        </div>

        <form action="{{ route('berita.komentar.post', ['slug' => $berita->slug]) }}" method="POST">
            @csrf
            <div class="input-group border mb-3">
                <input type="text" class="form-control border-0" placeholder="Tuliskan Komentar Anda" name="isi">
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