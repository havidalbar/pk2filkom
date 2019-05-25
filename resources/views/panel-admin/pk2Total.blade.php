@extends('panel-admin.dashboard', ['menuKiri' => false])
@section('isiKontent')
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-body__content">
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title" style="transform: translateY(10px);">
                    DATA
                    <small>
                        Rekap total PK2MABA
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
                            NIM
                        </th>
                        <th title="Field #2">
                            Total Nilai PK2MABA
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @for($i=0;$i<count($pk2mabaRekapNilai);$i++)
                    <?php
                    $total = $pk2mabaRekapNilai[$i]->aktif_rangkaian1+$pk2mabaRekapNilai[$i]->penerapan_nilai_rangkaian1+
                    $pk2mabaRekapNilai[$i]->aktif_rangkaian2+$pk2mabaRekapNilai[$i]->penerapan_nilai_rangkaian2-
                    $pk2mabaRekapNilai[$i]->ringan-$pk2mabaRekapNilai[$i]->sedang-
                    $pk2mabaRekapNilai[$i]->berat;
                    ?>
                    <tr>
                        <td>
                            {{$pk2mabaRekapNilai[$i]->nim}}
                        </td>
                        <td>
                            {{$total}}
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
</div>
@endsection
