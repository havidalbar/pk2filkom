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
                        Rekap Tugas PK2MABA
                    </small>
                </h3>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__body pt-1">
                <form action="/editPk2Tugas" class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group m--margin-top-10">
                            <div class="alert m-alert m-alert--default" role="alert">
                                Form edit esai PK2MABA.
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
                        <div class="form-group m-form__group row {{ $errors->has('nilaipg') ? 'has-danger' : '' }}">
                            <label for="nilaipg-text-input" class="col-3 col-form-label">
                                Nilai Pilihan ganda
                            </label>
                            <div class="col-9">
                                <input class="form-control m-input {{ $errors->has('nilaipg') ? 'form-control-danger' : '' }}" name="nilaipg" placeholder="nilaipg" value="Nilai Pilihan ganda" type="text" id="nilaipg-text-input" readonly="true">
                                {!! $errors->first('nilaipg','<div class="form-control-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="form-group m-form__group row {{ $errors->has('nilaiesai') ? 'has-danger' : '' }}">
                            <label for="nilaiesai-text-input" class="col-3 col-form-label">
                                Nilai Esai  
                            </label>
                            <div class="col-9">
                                <input class="form-control m-input {{ $errors->has('nilaiesai') ? 'form-control-danger' : '' }}" name="nilaiesai" placeholder="nilaiesai" value="Nilai Esai" type="text" id="nilaiesai-text-input">
                                {!! $errors->first('nilaiesai','<div class="form-control-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <a href="/lihatEsaiPk2Tugas" class="m-btn btn btn-primary">
                                    <span>
                                        <i class="fa fa-eye fa-fw"></i>
                                        <span>
                                            Lihat Esai
                                        </span>
                                    </span>
                                </a>
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