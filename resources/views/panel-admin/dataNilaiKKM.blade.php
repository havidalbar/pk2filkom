@extends('panel-admin.NilaiKKM')
@section('assideKontent')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title" style="transform: translateY(10px);">
                    DATA
                    <small>
                        NILAI KKM
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
                                    <input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
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
                        <th title="Field #1">
                            ID
                        </th>
                        <th title="Field #2">
                            Kegiatan
                        </th>
                        <th title="Field #3">
                            Nilai
                        </th>
                        <th title="Field #5">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @for($i=0;$i<count($nilaikkms);$i++)
                    <tr>
                        <td>
                            {{$nilaikkms[$i]->id}}
                        </td>
                        <td>
                            {{$nilaikkms[$i]->kegiatan}}
                        </td>
                        <td>
                            {{$nilaikkms[$i]->nilai}}
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="First group">
                                <a href="{{route('panel.full.show-edit-nilai-kkm',$nilaikkms[$i]->id)}}" class="m-btn btn btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{route('panel.full.hapus-nilai-kkm',$nilaikkms[$i]->id)}}" class="m-btn btn btn-danger" method="POST">
                                    {{csrf_field()}}
                                    <button class="fa fa-trash-o"></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>
            <!--end: Datatable -->
        </div>
    </div>
</div>
</div>
@endsection
