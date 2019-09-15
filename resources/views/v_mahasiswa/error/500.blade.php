@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<div class="jumbotron jumbotron-fluid bg-halError">
    <div class="container error">
        <div class="textError">
            <p>Tampaknya terjadi kesalahan data</p>
            <p>Silahkan muat ulang kembali halaman sebelumnya :)</p>
        </div>
        <div class="card home" onclick="window.history.back()">
            KEMBALI
        </div>
    </div>
</div>
@endsection
