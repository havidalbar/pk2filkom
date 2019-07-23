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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<script>
    $(document).ready(function () {
        $(function() {
            $('.tanggal-waktu').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss'
            });
        });
        
		$(document).on('click', '#hapusData', function(e){
            
			e.preventDefault();
            const target = $(this).data('target');
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
            title: 'Apakah kamu yakin?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Iya',
            cancelButtonText: 'Tidak',
            reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    document.getElementById(target).submit();
                    swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Anda berhasil menghapus data ini.',
                    'success'
                    )
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Data tidak terhapus :)',
                    'error'
                    )
                }
            })
		});
    }); 
    </script>
	<style>
		body.swal2-height-auto {
			height: inherit !important;
        }
        .swal2-actions button {
            margin: 20px;
        }
	</style>
</body>
@endsection