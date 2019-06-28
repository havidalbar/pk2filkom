@extends('panel-admin.coreAdmin.index')
@section('title','contact')
@section('content')

<body style="background-image: url({{asset('img/bg-admin/bg-1.png')}}); background-size: 100% 100vh;"
    class="m-page--boxed m-body--fixed m-header--static m-aside--offcanvas-default">
    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <!-- begin::Body -->
        @include('panel-admin.coreAdmin.header')
        <!-- begin::Body -->
        <div
            class="m-grid__item m-grid__item--fluid m-grid m-grid m-grid--hor m-container m-container--responsive m-container--xxl">
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
                @include('panel-admin.coreAdmin.navigation')

                @yield('isiKontent')
            </div>
        </div>
        <!-- begin::Body -->
        @include('panel-admin.coreAdmin.footer')
    </div>
    <!-- end:: Page -->

    <!--begin::Base Scripts -->
    <script src="{{asset('admin/vendors/vendors.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/base/scripts.bundle.js')}}" type="text/javascript"></script>
    <!--end::Base Scripts -->
    <!--begin::Page Snippets -->
    <script src="{{asset('admin/dashboard.js')}}" type="text/javascript"></script>
    <!--end::Page Snippets -->
    <!--begin::Page Resources -->
    <script src="{{asset('admin/html-table.js')}}" type="text/javascript"></script>
    <!--end::Page Resources -->
    <!-- Bootstrap-datetimepicker -->
    <link rel="stylesheet" href="{{asset('admin/bootstrap-datetimepicker.min.css')}}">
	<script src="{{asset('admin/bootstrap-datetimepicker.min.js')}}"></script>
	<script>
    $(function() {
        $('.tanggal-waktu').datetimepicker({
			format: 'YYYY-MM-DD HH:mm:ss'
		});
    });
    </script>
</body>
@endsection