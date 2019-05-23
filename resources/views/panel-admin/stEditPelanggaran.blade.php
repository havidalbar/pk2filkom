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
                        PELANGGARAN STARTUP ACADEMY
                    </small>
                </h3>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body pt-1">
            <form action="/editStPelanggaran" class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
                @csrf
                @method("PUT")
                <div class="m-portlet__body">
                    <div class="form-group m-form__group m--margin-top-10">
                        <div class="alert m-alert m-alert--default" role="alert">
                            Form edit pelanggaran STARTUP ACADEMY.
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('nim') ? 'has-danger' : '' }}">
                        <label for="nim-text-input" class="col-3 col-form-label">
                            NIM
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('nim') ? 'form-control-danger' : '' }}" name="nim" placeholder="Nim" value="nim mahasiswa" type="text" id="nim-text-input" readonly="true">
                            {!! $errors->first('nim','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('ringan') ? 'has-danger' : '' }}">
                        <label for="ringan-text-input" class="col-3 col-form-label">
                            Ringan
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('ringan') ? 'form-control-danger' : '' }}" name="ringan" placeholder="ringan" value="Nilai Rangkaian Ke 1" type="text" id="ringan-text-input">
                            {!! $errors->first('ringan','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('sedang') ? 'has-danger' : '' }}">
                        <label for="sedang-text-input" class="col-3 col-form-label">
                            Sedang
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('sedang') ? 'form-control-danger' : '' }}" name="sedang" placeholder="sedang" value="Nilai Rangkaian Ke 2" type="text" id="sedang-text-input">
                            {!! $errors->first('sedang','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('berat') ? 'has-danger' : '' }}">
                        <label for="berat-text-input" class="col-3 col-form-label">
                            Berat
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('berat') ? 'form-control-danger' : '' }}" name="berat" placeholder="berat" value="Nilai Rangkaian Ke 2" type="text" id="berat-text-input">
                            {!! $errors->first('berat','<div class="form-control-feedback">:message</div>') !!}
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