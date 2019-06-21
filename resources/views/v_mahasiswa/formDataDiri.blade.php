@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('css')
<!-- Icon CSS -->
<link rel="stylesheet" href="{{asset('css/form-styles.css')}}">
<!-- Bootstrap-datepicker css -->
<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">
@endsection

@section('js')
<!-- Bootstrap-datepicker js -->
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.id.min.js')}}"></script>
<script>
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    $('.toast').toast('show');
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>
@endsection

@section('content')

<div class="bg-form-data-diri">
    <div class="container-fluid">
        <div class="row full-height">
            <div class="col-sm">
                <div class="container h-100 d-flex justify-content-center align-items-center animasi slideKeAtas">
                    <img src="{{asset('img/bg-section/simaba4@4x.svg')}}" class="img pk2content">
                </div>
            </div>
            <div class="col-sm bg-form">
                <div class="row h-100 justify-content-center align-items-center">
                    <form class="col-sm-12 col-md-9 needs-validation" method="POST" action="blabla.php" novalidate>
                        <h1 class="text-center text-white font-italic">Form Data Diri</h1>
                        <div class="form-row pt-2">
                            <div class="form-group col-md-6 pt-3">
                                <label class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text icon-input">
                                            <i class="icon-tempat-biru fa-lg"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="coba" class="form-control form-data-diri shadow-none"
                                        name="tempatLahir" placeholder="Tempat Lahir" required>
                                </label>
                            </div>
                            <div class="form-group col-md-6 pt-3">
                                <label class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text icon-input"><i class="icon-ttl-biru fa-lg"></i>
                                        </div>
                                    </div>
                                    <input class="tanggal form-control form-data-diri shadow-none" name="tanggalLahir"
                                        placeholder="08/08/1999" onkeydown="return false" required>
                                </label>
                            </div>
                        </div>
                        <div class="form-group pt-3">
                            <label class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text icon-input"><i class="icon-agama-biru fa-lg"></i></div>
                                </div>
                                <select class="custom-select form-data-diri shadow-none" name="agama" required>
                                    <option value="" selected disabled>Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Kong Hu Cu">Kong Hu Cu</option>
                                </select>
                            </label>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 pt-3">
                                <label class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text icon-input"><i class="icon-gender-biru fa-lg"></i>
                                        </div>
                                    </div>
                                    <select class="custom-select form-data-diri shadow-none" name="jenisKelamin"
                                        required>
                                        <option value="" selected disabled>Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </label>
                            </div>
                            <div class="form-group col-md-6 pt-3">
                                <label class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text icon-input"><i class="icon-goldar-biru fa-lg"></i>
                                        </div>
                                    </div>
                                    <select class="custom-select form-data-diri shadow-none" name="golDarah" required>
                                        <option value="" selected disabled>Gol. Darah</option>
                                        <option value="O">O</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="form-group pt-3">
                            <label class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text icon-input"><i class="icon-sakit-biru fa-lg"></i></div>
                                </div>
                                <input type="text" class="form-control form-data-diri shadow-none" name="penyakit"
                                    placeholder="Riwayat Penyakit" required>
                            </label>
                        </div>
                        <div class="form-group pt-3">
                            <label class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text icon-input"><i class="icon-alergi-biru fa-lg"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control form-data-diri shadow-none" name="alergi"
                                    placeholder="Alergi" required>
                            </label>
                        </div>
                        <div class="form-group pt-3 pb-4">
                            <label class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text icon-input"><i
                                            class="fa fa-phone fa-lg fa-flip-horizontal"></i>
                                    </div>
                                </div>
                                <input type="number" class="form-control form-data-diri shadow-none" name="telepon"
                                    placeholder="Nomor Telepon" required>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-lg btn-block lanjutkan font-semibold">Lanjutkan</button>
                    </form>
                </div>
            </div>
            <div class="alert-form position-fixed">
                <div class="toast" role="alert" data-animation="true">
                    <div class="toast-header">
                        <strong class="mr-auto">Bootstrap</strong>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        Silahkan lengkapi terlebih dahulu semua data yang dibutuhkan.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection