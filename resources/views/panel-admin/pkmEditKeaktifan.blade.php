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
                        PKM TOUR KEAKTIFAN
                    </small>
                </h3>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body pt-1">
            <form action="{{route('panel.full.edit-pkm-keaktifan',$pk2mabaTourKeaktifan->nim)}}" class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
                @csrf
                @method("PUT")
                <div class="m-portlet__body">
                    <div class="form-group m-form__group m--margin-top-10">
                        <div class="alert m-alert m-alert--default" role="alert">
                            Form edit keaktifan ACADEMY KEAKTIFAN.
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('nim') ? 'has-danger' : '' }}">
                        <label for="nim-text-input" class="col-3 col-form-label">
                            NIM
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('nim') ? 'form-control-danger' : '' }}" name="nim" placeholder="Nim" value="{{$pk2mabaTourKeaktifan->nim}}" type="text" id="nim-text-input" readonly="true">
                            {!! $errors->first('nim','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('nilaik1') ? 'has-danger' : '' }}">
                        <label for="nilaik1-text-input" class="col-3 col-form-label">
                            Nilai Keaktifan Ke - 1
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('nilaik1') ? 'form-control-danger' : '' }}" name="aktif_rangkaian6" placeholder="nilaik1" value="{{$pk2mabaTourKeaktifan->aktif_rangkaian6}}" type="text" id="nilaik1-text-input">
                            {!! $errors->first('nilaik1','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('nilaip1') ? 'has-danger' : '' }}">
                        <label for="nilaip1-text-input" class="col-3 col-form-label">
                            Nilai Penerapan Ke - 1
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('nilaip1') ? 'form-control-danger' : '' }}" name="penerapan_nilai_rangkaian6" placeholder="nilaip1" value="{{$pk2mabaTourKeaktifan->penerapan_nilai_rangkaian6}}" type="text" id="nilaip1-text-input">
                            {!! $errors->first('nilaip1','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('nilaik2') ? 'has-danger' : '' }}">
                        <label for="nilaik2-text-input" class="col-3 col-form-label">
                            Nilai Keaktifan Ke - 2
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('nilaik2') ? 'form-control-danger' : '' }}" name="aktif_rangkaian7" placeholder="nilaik2" value="{{$pk2mabaTourKeaktifan->aktif_rangkaian7}}" type="text" id="nilaik2-text-input">
                            {!! $errors->first('nilaik2','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('nilaip2') ? 'has-danger' : '' }}">
                        <label for="nilaip2-text-input" class="col-3 col-form-label">
                            Nilai Penerapan Ke - 2
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('nilaip2') ? 'form-control-danger' : '' }}" name="penerapan_nilai_rangkaian7" placeholder="nilaip2" value="{{$pk2mabaTourKeaktifan->penerapan_nilai_rangkaian7}}" type="text" id="nilaip2-text-input">
                            {!! $errors->first('nilaip2','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('nilaik3') ? 'has-danger' : '' }}">
                        <label for="nilaik3-text-input" class="col-3 col-form-label">
                            Nilai Keaktifan Ke - 3
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('nilaik3') ? 'form-control-danger' : '' }}" name="aktif_rangkaian8" placeholder="nilaik3" value="{{$pk2mabaTourKeaktifan->aktif_rangkaian8}}" type="text" id="nilaik3-text-input">
                            {!! $errors->first('nilaik3','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('nilaip3') ? 'has-danger' : '' }}">
                        <label for="nilaip3-text-input" class="col-3 col-form-label">
                            Nilai Penerapan Ke - 3
                        </label>
                        <div class="col-9">
                            <input class="form-control m-input {{ $errors->has('nilaip3') ? 'form-control-danger' : '' }}" name="penerapan_nilai_rangkaian8" placeholder="nilaip3" value="{{$pk2mabaTourKeaktifan->penerapan_nilai_rangkaian8}}" type="text" id="nilaip3-text-input">
                            {!! $errors->first('nilaip3','<div class="form-control-feedback">:message</div>') !!}
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
