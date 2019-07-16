@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<div class="jumbotron jumbotron-fluid bg-halError">
    <div class="container error">
        <div class="textError">
            <p class="errormsg">404</p>
            <p>Page Not Found</p>
            <p>Belum move on? Halaman ini aja udah :)</p>
        </div>
        <div class="card home" onclick="window.location.href='/'">
            HOME
        </div>
    </div>
</div>
@endsection
