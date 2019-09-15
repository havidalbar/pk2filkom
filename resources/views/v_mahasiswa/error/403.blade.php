@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<div class="jumbotron jumbotron-fluid bg-halError">
    <div class="container error">
        <div class="textError">
            <p>Anda tidak memiliki akses</p>
            <p>Silahkan kembali ke halaman sebelumnya :)</p>
        </div>
        <div class="card home" onclick="window.history.back()">
            KEMBALI
        </div>
    </div>
</div>
@endsection
