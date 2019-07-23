@extends ('layouts.template')
@section('title', 'Berita | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->
<div class="jumbotron jumbotron-fluid pk2-dtBerita">
    <div class="container-fluid m-auto h-100">
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
        <div class="center slider responsive py-5 h-100">
            @foreach ($beritas as $berita_top)
            <div>
                <div class="slider-berita">
                    <img src="{{ $berita_top->thumbnail_src }}">
                    <div class="overlay">
                        <h2>{{ $berita_top->judul }}</h2>
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <a href="{{ route('berita.show', ['slug' => $berita_top->slug]) }}" class="info"
                                target="_blank">
                                Lihat Berita
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="infoBerita mx-auto">
                <h1 class="titleBerita">{{ $berita->judul }}</h1>
                <span class="creatAt"><i class="far fa-calendar-alt"></i> Dipublikasikan pada :
                    <span id="waktu-publis"></span></span>
                <script type="text/javascript">
                    var date = moment.utc("{{ $berita->created_at }}").local().format("DD-MM-YYYY, h:mm a");                            
                    document.getElementById("waktu-publis").innerHTML = date;
                </script>
            </div>
        </div>
    </div>
    @foreach ($berita->sub as $sub)
    <div class="row">
        <div class="col-md-6 px-md-0 vdBerita">
            <div class="zoom">
                <img src="{{ $sub->thumbnail_src }}" />
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
        @foreach ($berita->komentar as $komentar)
        @if (!$komentar->komentar_ke)
        <div class="media commentBerita py-2 px-3">
            <img src="https://api.adorable.io/avatars/400/random-{{$komentar->id}}"
                class="img commentImg align-self-start mr-3" />
            <div class="media-body">
                <div class="media-title">
                    <p>
                        @if ($komentar->username_admin)
                        <strong>{{ $komentar->username_admin . ' | Admin' }}</strong>
                        @else
                        <strong>{{ $komentar->pengirim_mahasiswa->nama ?? '' }}</strong>
                        @endif
                        <span class="sub-title" id="waktu-{{$komentar->id}}" style="display: block"></span>
                        <script type="text/javascript">
                            var date = moment.utc("{{ $komentar->created_at }}").local().format("DD-MM-YYYY, h:mm a");                            
                            document.getElementById("waktu-{{$komentar->id}}").innerHTML = date;
                        </script>
                    </p>
                </div>
                <p id="dComment-{{$komentar->id}}">{{ $komentar->isi }}</p>
            </div>
            @if (session('username') || session('nim'))
            <div class="input-group-append actionComment" id="actionComment-{{$komentar->id}}">
                @if ((session('username') && session('username') == $komentar->username_admin)
                || (session('nim') && session('nim') == $komentar->nim_mahasiswa))
                <button class="btn btn-comment buttonEdit" id="buttonEdit-{{$komentar->id}}">Edit</button>
                <span>|</span>
                @endif
                <button class="btn btn-comment" id="buttonBalas-{{$komentar->id}}">Balas</button>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#actionComment-{{$komentar->id}}').on('click', '#buttonEdit-{{$komentar->id}}', function () {                            
                            let parentCek = $(this).parent().parent().parent();
                            if (parentCek.find('form').length > 0) {
                                alert('Silahkan tutup terlebih dahulu form edit/balas komentar sebelumnya')
                            }
                            else{
                                let value = $('#dComment-{{$komentar->id}}').text();                            
                                let parentEdit = $(this).parent().parent().find('#dComment-{{$komentar->id}}');
                                let form = $("<form/>", { action: "{{ route('berita.komentar.update', ['slug' => $berita->slug, 'id' => $komentar->id]) }}", method:'POST', id: 'editComent-{{$komentar->id}}' });
                                let input = $('<textarea />', { 'class':'w-100' ,'type': 'text', 'name': 'isi', 'maxlength': '500'});
                                let method = $('<input />', { 'type': 'hidden', 'name': '_method', 'value': 'PUT' });
                                let token = $('<input />', { 'type': 'hidden', 'name': '_token', 'value': '{{ csrf_token() }}' });                            
                                
                                $(parentEdit).parent().append(form.append(token,method,input));
                                $(parentEdit).parent().find('textarea').val(value);
                                $(parentEdit).remove();
                                input.putEnd().on("focus", function () {
                                    searchInput.putEnd();
                                });

                                let buttonNext = $(this).parent();
                                buttonNext.empty();

                                buttonNext.append(`
                                <button class="btn btn-comment" type="submit" form="editComent-{{$komentar->id}}">Kirim</button>
                                    <span>|</span>
                                <button class="btn btn-comment" id="batalComment-{{$komentar->id}}">Batal</button>
                                `);
                            }                            
                        });
                        $('#actionComment-{{$komentar->id}}').on('click', '#batalComment-{{$komentar->id}}', function () {
                            let element = $(this).parent();
                            let parentEdit = $(this).parent().parent().find('#editComent-{{$komentar->id}}');

                            var input = $('<p />', { 'id': 'dComment-{{$komentar->id}}', 'text': "{{ $komentar->isi }}" });
                            $(parentEdit).parent().append(input);
                            $(parentEdit).remove();

                            element.empty();
                            element.append(`
                            <button class="btn btn-comment buttonEdit" id="buttonEdit-{{$komentar->id}}">Edit</button>
                                <span>|</span>
                            <button class="btn btn-comment" id="buttonBalas-{{$komentar->id}}">Balas</button>
                            `);
                        });
                        $('#actionComment-{{$komentar->id}}').on('click', '#buttonBalas-{{$komentar->id}}', function () {                                
                            let parentCek = $(this).parent().parent().parent();
                            if (parentCek.find('form').length > 0) {
                                alert('Silahkan tutup terlebih dahulu form edit/balas komentar sebelumnya')
                            } else {
                                let parentBalas = $(this).parent().parent();   
                                $(this).replaceWith('<button class="btn btn-comment" id="buttonBatalBalas-{{$komentar->id}}">X</button>');
                                let form = $("<form/>", { action: "{{ route('berita.komentar.reply', ['slug' => $berita->slug, $komentar->id]) }}", method:'POST', id: 'balasComent-{{$komentar->id}}', class: 'balasComent' });
                                let token = $('<input />', { 'type': 'hidden', 'name': '_token', 'value': '{{ csrf_token() }}' });
                                let balas = `
                                <div class="input-group border mb-3">
                                    <textarea type="text" class="form-control border-0" placeholder="Tuliskan Komentar Anda" name="isi" maxlength= "500"></textarea>
                                    <div class="input-group-append">
                                        <button class="btn btn-comment" type="submit" id="button-addon2">Kirim</button>
                                    </div>
                                </div>`;
                                $(parentBalas).append(form.append(token,balas));
                                let input = parentBalas.find('textarea');
                                    input.putEnd().on("focus", function () {
                                    searchInput.putEnd();
                                });
                            }
                        });
                        $('#actionComment-{{$komentar->id}}').on('click', '#buttonBatalBalas-{{$komentar->id}}', function () {
                            let hapusReplay = $(this).parent().parent().find('form#balasComent-{{$komentar->id}}');                            
                            $(hapusReplay).remove();
                            $(this).replaceWith('<button class="btn btn-comment" id="buttonBalas-{{$komentar->id}}">Balas</button>')
                        });
                    });
                </script>
            </div>
            @endif
            {{-- Reply --}}
            @foreach ($berita->komentar as $reply)
            @if ($reply->komentar_ke == $komentar->id)
            <div class="media commentBerita replayComment py-2 px-3">
                <img src="https://api.adorable.io/avatars/400/random-{{$reply->id}}"
                    class="img commentImg align-self-start mr-3" />
                <div class="media-body">
                    <div class="media-title">
                        <p>
                            @if ($reply->username_admin)
                            <strong>{{ $reply->username_admin . ' | Admin' }}</strong>
                            @else
                            <strong>{{ $reply->pengirim_mahasiswa->nama ?? '' }}</strong>
                            @endif
                            <span class="sub-title" id="waktu-{{$reply->id}}" style="display: block"></span>
                            <script type="text/javascript">
                                var date = moment.utc("{{ $reply->created_at }}").local().format("DD-MM-YYYY, h:mm a");                            
                                document.getElementById("waktu-{{$reply->id}}").innerHTML = date;
                            </script>
                        </p>
                    </div>
                    <p id="dComment-{{$reply->id}}">{{ $reply->isi }}</p>
                </div>
                @if (session('username') || session('nim'))
                <div class="input-group-append actionComment" id="actionComment-{{$reply->id}}">
                    @if ((session('username') && session('username') == $reply->username_admin)
                    || (session('nim') && session('nim') == $reply->nim_mahasiswa))
                    <button class="btn btn-comment buttonEdit" id="buttonEdit-{{$reply->id}}">Edit</button>
                    <span>|</span>
                    @endif
                    <button class="btn btn-comment" id="buttonBalas-{{$reply->id}}">Balas</button>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#actionComment-{{$reply->id}}').on('click', '#buttonEdit-{{$reply->id}}', function () {                            
                                let parentCek = $(this).parent().parent().parent().parent();                                                                                      
                                if (parentCek.find('form').length > 0) {
                                    alert('Silahkan tutup terlebih dahulu form edit/balas komentar sebelumnya')
                                }
                                else{
                                    let value = $('#dComment-{{$reply->id}}').text();        
                                    let parentEdit = $(this).parent().parent().find('#dComment-{{$reply->id}}');
                                    let form = $("<form/>", { action: "{{ route('berita.komentar.update', ['slug' => $berita->slug, 'id' => $reply->id]) }}", method:'POST', id: 'editComent-{{$reply->id}}' });
                                    let input = $('<textarea />', { 'class':'w-100' ,'type': 'text', 'name': 'isi', 'maxlength': '500'});
                                    let method = $('<input />', { 'type': 'hidden', 'name': '_method', 'value': 'PUT' });
                                    let token = $('<input />', { 'type': 'hidden', 'name': '_token', 'value': '{{ csrf_token() }}' });                            
                                    
                                    $(parentEdit).parent().append(form.append(token,method,input));
                                    $(parentEdit).parent().find('textarea').val(value);
                                    $(parentEdit).remove();
                                    input.putEnd().on("focus", function () {
                                        searchInput.putEnd();
                                    });

                                    let buttonNext = $(this).parent();
                                    buttonNext.empty();

                                    buttonNext.append(`
                                    <button class="btn btn-comment" type="submit" form="editComent-{{$reply->id}}">Kirim</button>
                                        <span>|</span>
                                    <button class="btn btn-comment" id="batalComment-{{$reply->id}}">Batal</button>
                                    `);
                                }                                
                            });
                            $('#actionComment-{{$reply->id}}').on('click', '#batalComment-{{$reply->id}}', function () {
                                let element = $(this).parent();
                                let parentEdit = $(this).parent().parent().find('#editComent-{{$reply->id}}');

                                var input = $('<p />', { 'id': 'dComment-{{$reply->id}}', 'text': "{{ $reply->isi }}" });
                                $(parentEdit).parent().append(input);
                                $(parentEdit).remove();

                                element.empty();
                                element.append(`
                                <button class="btn btn-comment buttonEdit" id="buttonEdit-{{$reply->id}}">Edit</button>
                                    <span>|</span>
                                <button class="btn btn-comment" id="buttonBalas-{{$reply->id}}">Balas</button>
                                `);
                            });
                            $('#actionComment-{{$reply->id}}').on('click', '#buttonBalas-{{$reply->id}}', function () { 
                                let parentCek = $(this).parent().parent().parent().parent();            
                                if (parentCek.find('form').length > 0) {
                                    alert('Silahkan tutup terlebih dahulu form edit/balas komentar sebelumnya');
                                } else {
                                    let parentBalas = $(this).parent().parent().parent();
                                    $(this).replaceWith('<button class="btn btn-comment" id="buttonBatalBalas-{{$reply->id}}">X</button>');
                                    let form = $("<form/>", { action: "{{ route('berita.komentar.reply', ['slug' => $berita->slug, $komentar->id]) }}", method:'POST', id: 'balasComent-{{$reply->id}}', class: 'balasComent' });
                                    let token = $('<input />', { 'type': 'hidden', 'name': '_token', 'value': '{{ csrf_token() }}' });
                                    let balas = `
                                    <div class="input-group border mb-3">
                                        <textarea type="text" class="form-control border-0" placeholder="Tuliskan Komentar Anda" name="isi" maxlength= "500"></textarea>
                                        <div class="input-group-append">
                                            <button class="btn btn-comment" type="submit" id="button-addon2">Kirim</button>
                                        </div>
                                    </div>`;
                                    $(parentBalas).append(form.append(token,balas));                                    
                                    let input = parentBalas.find('textarea');
                                        input.putEnd().on("focus", function () {
                                        searchInput.putEnd();
                                    });
                                }
                            });
                            $('#actionComment-{{$reply->id}}').on('click', '#buttonBatalBalas-{{$reply->id}}', function () {
                                let hapusReplay = $(this).parent().parent().parent().find('form#balasComent-{{$reply->id}}');                            
                                $(hapusReplay).remove();
                                $(this).replaceWith('<button class="btn btn-comment" id="buttonBalas-{{$reply->id}}">Balas</button>')
                            });
                        });
                    </script>
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
    </div>
    <div class="container" style="margin-bottom: 60px">
        <form action="{{ route('berita.komentar.post', ['slug' => $berita->slug]) }}" method="POST">
            {{ csrf_field() }}
            <div class="input-group border mb-3">
                <textarea type="text" rows="5" class="form-control border-0" placeholder="Tuliskan Komentar Anda"
                    name="isi" maxlength="500"></textarea>
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