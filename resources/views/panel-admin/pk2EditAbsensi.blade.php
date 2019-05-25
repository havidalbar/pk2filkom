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
                        PK2MABA ABSENSI
                    </small>
                </h3>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body pt-1">
        <form action="{{route('panel.full.edit-pk2-absensi',$pk2mabaAbsen->nim)}}" class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
                @csrf
                @method("POST")
                <div class="m-portlet__body">
                    <div class="form-group m-form__group m--margin-top-10">
                        <div class="alert m-alert m-alert--default" role="alert">
                            Form edit absensi PK2MABA.
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('nim') ? 'has-danger' : '' }}">
                        <label for="nim-text-input" class="col-3 col-form-label">
                            NIM
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('nim') ? 'form-control-danger' : '' }}" name="nim" placeholder="Nim" value="{{$pk2mabaAbsen->nim}}" type="text" id="nim-text-input" readonly="true">
                            {!! $errors->first('nim','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('nilaiR1') ? 'has-danger' : '' }}">
                        <label for="nilaiR1-text-input" class="col-3 col-form-label">
                            Nilai Rangkaian Ke - 1
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('nilaiR1') ? 'form-control-danger' : '' }}" name="nilai_rangkaian1" placeholder="nilaiR1" value="{{$pk2mabaAbsen->nilai_rangkaian1}}" type="text" id="nilaiR1-text-input">
                            {!! $errors->first('nilaiR1','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('nilaiR2') ? 'has-danger' : '' }}">
                        <label for="nilaiR2-text-input" class="col-3 col-form-label">
                            Nilai Rangkaian Ke - 2
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('nilaiR2') ? 'form-control-danger' : '' }}" name="nilaiR2" placeholder="nilai_rangkaian2" value="{{$pk2mabaAbsen->nilai_rangkaian2}}" type="text" id="nilaiR2-text-input">
                            {!! $errors->first('nilaiR2','<div class="form-control-feedback">:message</div>') !!}
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
