@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<div class="jumbotron jumbotron-fluid bg-login">
    <div class="container d-flex flex-column align-items-center justify-content-center">
        <div>
            <img src="{{ asset('img/bg-section/simaba4@4x.svg') }}" class="img-logo">
        </div>
        <div class="form-login">
            <form method="POST">
                @csrf
                <div class="form-group">
                    <input type="number" class="form-control" name="nim" placeholder="Masukkan NIM">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Masukkan Kata Sandi">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-login">Masuk</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection