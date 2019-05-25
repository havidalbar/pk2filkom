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
                        STARTUP ACADEMY ABSENSI
                    </small>
                </h3>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body pt-1">
            <form action="{{route('panel.full.edit-stAbsensi',$startupAbsen->nim)}}" class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
                @csrf
                @method("POST")
                <div class="m-portlet__body">
                    <div class="form-group m-form__group m--margin-top-10">
                        <div class="alert m-alert m-alert--default" role="alert">
                            Form edit absensi STARTUP ACADEMY.
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('nim') ? 'has-danger' : '' }}">
                        <label for="nim-text-input" class="col-3 col-form-label">
                            NIM
                        </label>
                        <div class="col-9">
                        <input class="form-control m-input {{ $errors->has('nim') ? 'form-control-danger' : '' }}" name="nim" placeholder="Nim" value="{{$startupAbsen->nim}}" type="text" id="nim-text-input" readonly="true">
                            {!! $errors->first('nim','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('nilaiR3') ? 'has-danger' : '' }}">
                        <label for="nilaiR3-text-input" class="col-3 col-form-label">
                            Nilai Rangkaian Ke - 3
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('nilaiR3') ? 'form-control-danger' : '' }}" name="nilai_rangkaian3" placeholder="nilaiR3" value="{{$startupAbsen->nilai_rangkaian3}}" type="text" id="nilaiR3-text-input">
                            {!! $errors->first('nilaiR3','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('nilaiR4') ? 'has-danger' : '' }}">
                        <label for="nilaiR4-text-input" class="col-3 col-form-label">
                            Nilai Rangkaian Ke - 4
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('nilaiR4') ? 'form-control-danger' : '' }}" name="nilai_rangkaian4" placeholder="nilaiR4" value="{{$startupAbsen->nilai_rangkaian4}}" type="text" id="nilaiR4-text-input">
                            {!! $errors->first('nilaiR4','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('nilaiR5') ? 'has-danger' : '' }}">
                        <label for="nilaiR5-text-input" class="col-3 col-form-label">
                            Nilai Rangkaian Ke - 5
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('nilaiR5') ? 'form-control-danger' : '' }}" name="nilai_rangkaian5" placeholder="nilaiR5" value="{{$startupAbsen->nilai_rangkaian5}}" type="text" id="nilaiR5-text-input">
                            {!! $errors->first('nilaiR5','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            {{csrf_field()}}
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
