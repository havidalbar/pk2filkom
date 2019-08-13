@extends('panel-admin.tugas.core')
@section('isiKontent')
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-body__content">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title" style="transform: translateY(10px);">
                        JAWABAN
                        <small>
                            {{ $penugasan->judul }}
                        </small>
                    </h3>
                </div>
            </div>
        </div>
        <!-- END: Subheader -->
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__body pt-1">
                    <!--begin: Search Form -->
                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                        <div class="row align-items-center">
                            <div class="col-xl-8 order-2 order-xl-1">
                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="m-input-icon m-input-icon--left">
                                            <input type="text" class="form-control m-input m-input--solid"
                                                placeholder="Search..." id="generalSearch">
                                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                                <span>
                                                    <i class="la la-search"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 order-1 order-xl-1 m--align-right">
                                <a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon">
                                    <span>
                                        <i class="la la-cloud-upload"></i>
                                        <span>
                                            Ekspor Nilai
                                        </span>
                                    </span>
                                </a>
                                <a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon" data-toggle="modal"
                                    data-target="#import">
                                    <span>
                                        <i class="la la-cloud-download"></i>
                                        <span>
                                            Impor Nilai
                                        </span>
                                    </span>
                                </a>
                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                            </div>
                        </div>
                    </div>
                    <!--end: Search Form -->
                    <!--begin: Datatable -->
                    <table class="m-datatable" id="html_table" width="100%">
                        <thead>
                            <tr>
                                <th title="NIM">
                                    NIM
                                </th>
                                <th title="Nama">
                                    Nama
                                </th>
                                @foreach ($penugasan->soal as $soal)
                                <th title="Jawaban Soal {{ $soal->index + 1 }}">
                                    {{ $soal->soal }}
                                </th>
                                @endforeach
                                <th title="Nilai">
                                    Nilai
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswas as $mahasiswa)
                            <tr>
                                <td>{{ $mahasiswa->nim }}</td>
                                <td>{{ $mahasiswa->nama }}</td>
                                @foreach ($penugasan->soal as $soal)
                                @foreach ($mahasiswa->jawaban as $jawaban)
                                @if ($soal->id == $jawaban->id_soal)
                                @php
                                $jawabanText = $jawaban->jawaban;
                                @endphp
                                @break
                                @endif
                                @endforeach
                                <td>
                                    @if (isset($jawabanText))
                                    @if ($penugasan->jenis == 7)
                                    {{ $jawabanText }}
                                    @else
                                    <a href="{{ $jawabanText }}" target="_blank">{{ $jawabanText }}</a>
                                    @endif
                                    @else
                                    -
                                    @endif
                                </td>
                                @php
                                unset($jawabanText);
                                @endphp
                                @endforeach
                                <td>
                                    @foreach ($mahasiswa->nilai_penugasan as $nilai)
                                    @if ($penugasan->id == $nilai->id_penugasan)
                                    @php
                                    $nilaiText = $nilai->nilai;
                                    @endphp
                                    @break
                                    @endif
                                    @endforeach
                                    {{ $nilaiText ?? 0 }}
                                    @php
                                    unset($nilaiText);
                                    @endphp
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable -->
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
                    Impor Nilai {{ $penugasan->judul }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <form action="{{ route('panel.penugasan.impor-penilaian', ['slug' => $penugasan->slug]) }}"
                enctype="multipart/form-data" class="m-form m-form--state m-form--fit m-form--label-align-right"
                method="POST">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group m-form__group row ">
                        <label for="impor_nilai_penugasan" class="col-4 col-form-label">
                            Impor Nilai
                        </label>
                        <div></div>
                        <div class="col-8">
                            <input type="file" id="impor_nilai_penugasan" name="nilai_penugasan" required="true"
                                accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Unggah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal-->
@endsection