@extends('panel-admin.kategori')
@section('assideKontent')
<div class="m-grid__item m-grid__item--fluid m-wrapper" style="width: 100vh">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title" style="transform: translateY(10px);">
                    EDIT 
                    <small>
                        KATEGORI
                    </small>
                </h3>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__body pt-1">

                <form action="/editKategori" class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    @include('panel-admin.coreAdmin.formKategori',['ketForm' => 'edit'])
                </form>

            </div>    
        </div>
    </div>
</div>
@endsection