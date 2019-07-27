@extends('panel-admin.mahasiswa.core')
@section('assideKontent')
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-body__content">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title" style="transform: translateY(10px);">
                        JAWABAN
                        <small>
                            <a href="{{ route('panel.penugasan.jawaban.view', ['slug' => $penugasan->slug]) }}">
                                {{ $penugasan->judul }}
                            </a> : {{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}
                        </small>
                    </h3>
                </div>
            </div>
        </div>
        <!-- END: Subheader -->
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__body pt-1">
                    <script>
                        let dataTts = {"menurun": {!! $menuruns !!}, "mendatar": {!! $mendatars !!}};
                    </script>
                    <!--begin: Datatable -->
                    <div class="row justify-content-center">
                        <div class="col-auto" id="tts"></div>
                        {{-- <input type="submit" value="Submit" class="button-submit-tts"> --}}
                        <div class="row mt-5" id="tts-soal"></div>
                    </div>
                    <!--end: Datatable -->
                    <script src="{{ asset('js/script_tts_terbaru.js') }}"></script>
                </div>
            </div>
        </div>
    </div>
</div>
<!--begin::Modal-->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Import Cluster Kelompok
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <form action="{{ route('panel.mahasiswa.import.cluster.kelompok') }}" enctype="multipart/form-data"
                class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group m-form__group row ">
                        <label for="import_cluster" class="col-4 col-form-label">
                            File Cluster Kelompok
                        </label>
                        <div></div>
                        <div class="col-8">
                            <input type="file" id="import_cluster" name="import_cluster" required="true"
                                accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Send
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal-->
@endsection