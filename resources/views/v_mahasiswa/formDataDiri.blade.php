@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('css')
<!-- Icon CSS -->
<link rel="stylesheet" href="{{asset('css/form-styles.css')}}">
@endsection

@section('content')

<div class="bg-form-data-diri">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-sm">
                <div class="container h-100 d-flex justify-content-center align-items-center animasi slideKeAtas">
                    <img src="{{asset('img/bg-section/simaba4@4x.svg')}}" class="img pk2content">
                </div>
            </div>
            <div class="col-sm bg-form">
                <div class="row h-100 justify-content-center align-items-center">
                    <form class="col-sm-12 col-md-9">
                        <h1 class="text-center text-white font-italic">Form Data Diri</h1>
                        <div class="form-row pt-2">
                            <div class="form-group col-md-6 pt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text form-input"><i class="icon-tempat-biru fa-lg"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-data-diri" placeholder="Tempat Lahir"
                                        style="box-shadow:none">
                                </div>
                            </div>
                            <div class="form-group col-md-6 pt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text form-input"><i class="icon-ttl-biru fa-lg"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-data-diri" placeholder="Apr 27, 1999"
                                        style="box-shadow:none">
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text form-input"><i class="icon-agama-biru fa-lg"></i></div>
                                </div>
                                <input type="text" class="form-control form-data-diri" placeholder="Agama"
                                    style="box-shadow:none">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 pt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text form-input"><i class="icon-gender-biru fa-lg"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-data-diri" placeholder="Jenis Kelamin"
                                        style="box-shadow:none">
                                </div>
                            </div>
                            <div class="form-group col-md-6 pt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text form-input"><i class="icon-goldar-biru fa-lg"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-data-diri" placeholder="Gol. Darah"
                                        style="box-shadow:none">
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text form-input"><i class="icon-sakit-biru fa-lg"></i></div>
                                </div>
                                <input type="text" class="form-control form-data-diri" placeholder="Riwayat Penyakit"
                                    style="box-shadow:none">
                            </div>
                        </div>
                        <div class="form-group pt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text form-input"><i class="icon-alergi-biru fa-lg"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control form-data-diri" placeholder="Alergi"
                                    style="box-shadow:none">
                            </div>
                        </div>
                        <div class="form-group pt-3 pb-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text form-input"><i
                                            class="fa fa-phone fa-lg fa-flip-horizontal"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control form-data-diri" placeholder="Nomor Telepon"
                                    style="box-shadow:none">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-block lanjutkan font-semibold">Lanjutkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection