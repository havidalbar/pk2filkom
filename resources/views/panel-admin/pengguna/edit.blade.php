@extends('panel-admin.pengguna.core')
@section('assideKontent')
<div class="m-grid__item m-grid__item--fluid m-wrapper" style="width: 100vh">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title" style="transform: translateY(10px);">
                    EDIT
                    <small>
                        PENGGUNA
                    </small>
                </h3>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__body pt-1">

                <form action="{{route('panel.pengguna.update',$dataPengguna->username)}}" class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
                    @csrf
                    @method('PUT')
                    @include('panel-admin.pengguna.form-create-edit',['ketForm' => 'edit'])
				</form>
				
            </div>
        </div>
    </div>
</div>
@endsection
