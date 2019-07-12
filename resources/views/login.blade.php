@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<div class="jumbotron jumbotron-fluid bg-login">
    <div class="container d-flex flex-column align-items-center justify-content-center">
        <div>
            <img src="{{ asset('img/bg-section/simaba4@4x.svg') }}" class="img-logo">
        </div>
        <div class="form-login">
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text" data-toggle="tooltip" data-placement="left" title="Gunakan Akun SIAM Untuk Login">
                                <i class="far fa-user-alt"></i>
                            </div>
                        </div>
                        <input type="number" class="form-control" name="nim" placeholder="Masukkan NIM" required>
                    </label>
                </div>
                <div class="form-group">
                    <label class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="far fa-lock-alt"></i>
                            </div>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Kata Sandi"
                            required>
                    </label>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-login">Masuk</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection