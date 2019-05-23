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
                        STARTUP ACADEMY TUGAS
                    </small>
                </h3>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body pt-1">
            <form action="/editStTugas" class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
                @csrf
                @method("PUT")
                <div class="m-portlet__body">
                    <div class="form-group m-form__group m--margin-top-10">
                        <div class="alert m-alert m-alert--default" role="alert">
                            Form edit tugas STARTUP ACADEMY.
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
                    <div class="form-group m-form__group row {{ $errors->has('nilaiSm') ? 'has-danger' : '' }}">
                        <label for="nilaiSm-text-input" class="col-3 col-form-label">
                            Nilai Short Movie
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('nilaiSm') ? 'form-control-danger' : '' }}" name="nilaiSm" placeholder="nilaiSm" value="Nilai Rangkaian Ke 1" type="text" id="nilaiSm-text-input">
                            {!! $errors->first('nilaiSm','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('nilaiMm') ? 'has-danger' : '' }}">
                        <label for="nilaiMm-text-input" class="col-3 col-form-label">
                            Nilai My Mory
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('nilaiMm') ? 'form-control-danger' : '' }}" name="nilaiMm" placeholder="nilaiMm" value="Nilai Rangkaian Ke 2" type="text" id="nilaiMm-text-input">
                            {!! $errors->first('nilaiMm','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('nilaiPm') ? 'has-danger' : '' }}">
                        <label for="nilaiPm-text-input" class="col-3 col-form-label">
                            Nilai Pengabdian Masyarakat
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('nilaiPm') ? 'form-control-danger' : '' }}" name="nilaiPm" placeholder="nilaiPm" value="Nilai Rangkaian Ke 2" type="text" id="nilaiPm-text-input">
                            {!! $errors->first('nilaiPm','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('nilaiPtOh') ? 'has-danger' : '' }}">
                        <label for="nilaiPtOh-text-input" class="col-3 col-form-label">
                            Nilai Post Test OH
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('nilaiPtOh') ? 'form-control-danger' : '' }}" name="nilaiPtOh" placeholder="nilaiPtOh" value="Nilai Rangkaian Ke 2" type="text" id="nilaiPtOh-text-input">
                            {!! $errors->first('nilaiPtOh','<div class="form-control-feedback">:message</div>') !!}
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