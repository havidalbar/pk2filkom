@extends('panel-admin.tugas-kelompok.core')
@section('assideKontent')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title" style="transform: translateY(10px);">
                    DATA
                    <small>
                        TUGAS KELOMPOK PKM
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
                    </div>
                </div>
                <!--end: Search Form -->
                <!--begin: Datatable -->
                <table class="m-datatable" id="html_table" width="100%">
                    <thead>
                        <tr>
                            <th title="Judul">
                                Judul
                            </th>
                            <th title="Jumlah soal">
                                Jumlah soal
                            </th>
                            <th title="Waktu mulai">
                                Waktu mulai
                            </th>
                            <th title="Waktu akhir">
                                Waktu akhir
                            </th>
                            <th title="Action">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penugasans as $index => $penugasan)
                        <tr>
                            <td>{{ $penugasan->judul }}</td>
                            <td>{{ $penugasan->soal_count }}</td>
                            <td>{{ $penugasan->waktu_mulai }}</td>
                            <td>{{ $penugasan->waktu_akhir }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="First group">
                                    <a href="{{ route('panel.penugasan-kelompok-pkm.edit', ['slug' => $penugasan->slug]) }}"
                                        class="m-btn btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('panel.penugasan-kelompok-pkm.jawaban.view', ['slug' => $penugasan->slug]) }}"
                                        class="m-btn btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <form id="delete-penugasan-form-{{ $penugasan->id }}"
                                        action="{{ route('panel.penugasan-kelompok-pkm.destroy', ['slug' => $penugasan->slug]) }}"
                                        method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a href="javascript:void(0)"
                                        onclick="document.getElementById(`delete-penugasan-form-{{ $penugasan->id }}`).submit()"
                                        class="m-btn btn btn-danger">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </div>
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
@endsection