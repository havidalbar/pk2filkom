@extends('panel-admin.tugas.core')
@section('assideKontent')
<div class="m-grid__item m-grid__item--fluid m-wrapper" style="width: 100vh">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title" style="transform: translateY(10px);">
                    EDIT
                    <small>
                        TUGAS
                    </small>
                </h3>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__body pt-1">
                <form action="{{ route('panel.penugasan.update', ['slug' => $penugasan->slug]) }}"
                    class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    @if ($penugasan->jenis === 4)
                    @include('panel-admin.tugas.form-create-edit-pilgan', ['ketForm' => 'edit'])
                    @elseif ($penugasan->jenis === 1 || $penugasan->jenis === 2 || $penugasan->jenis === 3 || $penugasan->jenis === 6)
                    @include('panel-admin.tugas.form-create-edit-link', ['ketForm' => 'edit'])
                    @elseif ($penugasan->jenis === 5)
                    @include('panel-admin.tugas.form-create-edit-offline', ['ketForm' => 'edit'])
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection