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
                        PKM TOUR TUGAS
                    </small>
                </h3>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body pt-1">
            <form action="/editPkmTugas" class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
                @csrf
                @method("PUT")
                <div class="m-portlet__body">
                    <div class="form-group m-form__group m--margin-top-10">
                        <div class="alert m-alert m-alert--default" role="alert">
                            Form edit tugas PKM TOUR.
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
                    <div class="form-group m-form__group row {{ $errors->has('presentasi') ? 'has-danger' : '' }}">
                        <label for="presentasi-text-input" class="col-3 col-form-label">
                            Presentasi
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('presentasi') ? 'form-control-danger' : '' }}" name="presentasi" placeholder="presentasi" value="Nilai Rangkaian Ke 1" type="text" id="presentasi-text-input">
                            {!! $errors->first('presentasi','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('abstraksi') ? 'has-danger' : '' }}">
                        <label for="abstraksi-text-input" class="col-3 col-form-label">
                            Abstraksi
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('abstraksi') ? 'form-control-danger' : '' }}" name="abstraksi" placeholder="abstraksi" value="Nilai Rangkaian Ke 2" type="text" id="abstraksi-text-input">
                            {!! $errors->first('abstraksi','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('proposal') ? 'has-danger' : '' }}">
                        <label for="proposal-text-input" class="col-3 col-form-label">
                            Proposal
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('proposal') ? 'form-control-danger' : '' }}" name="proposal" placeholder="proposal" value="Nilai Rangkaian Ke 2" type="text" id="proposal-text-input">
                            {!! $errors->first('proposal','<div class="form-control-feedback">:message</div>') !!}
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