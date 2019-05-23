@extends('panel-admin.dashboard', ['menuKiri' => false])
@section('isiKontent')
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-body__content">
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title" style="transform: translateY(10px);">
                    EDIT 
                    <small>
                        Rekap Tugas PKM TOUR
                    </small>
                </h3>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__body pt-1">
                <form action="/lihatPkmTugasAbstraksi" class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group m--margin-top-10">
                            <div class="alert m-alert m-alert--default" role="alert">
                                Form edit esai PKM TOUR.
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="form-group m-form__group row {{ $errors->has('kelompok') ? 'has-danger' : '' }}">
                                    <label for="kelompok-text-input" class="col-3 col-form-label">
                                        Kelompok
                                    </label>
                                    <div class="col-9">
                                        <input class="form-control m-input {{ $errors->has('kelompok') ? 'form-control-danger' : '' }}" name="kelompok" placeholder="kelompok" value="kelompok mahasiswa" type="text" id="kelompok-text-input" readonly="true">
                                        {!! $errors->first('kelompok','<div class="form-control-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row {{ $errors->has('nilaiabstraksi') ? 'has-danger' : '' }}">
                                    <label for="nilaiabstraksi-text-input" class="col-3 col-form-label">
                                        Nilai Abstraksi
                                    </label>
                                    <div class="col-9">
                                        <input class="form-control m-input {{ $errors->has('nilaiabstraksi') ? 'form-control-danger' : '' }}" name="nilaiabstraksi" placeholder="nilaiabstraksi" value="Nilai Pilihan ganda" type="text" id="nilaiabstraksi-text-input">
                                        {!! $errors->first('nilaiabstraksi','<div class="form-control-feedback">:message</div>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="form-group m-form__group row {{ $errors->has('abstraksi') ? 'has-danger' : '' }}">
                                    <label for="abstraksi-text-input" class="col-2 col-form-label">
                                    Abstraksi  
                                    </label>
                                    <div class="col-10">
                                        <textarea class="form-control m-input" readonly="true" rows="10">Isi Abstraksi</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary">
                                    Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>    
        </div>
    </div>
</div>
</div>
@endsection