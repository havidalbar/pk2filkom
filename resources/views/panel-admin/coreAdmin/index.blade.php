<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->

<head>
	<meta charset="utf-8" />
	<title>
		ADMIN PANEL || PK2MABA
	</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
	<!--begin::Web font -->
	<script src="https://cdn.bootcss.com/webfont/1.6.16/webfontloader.js"></script>
	<script>
		WebFont.load({
            google: {"families":["Montserrat:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
	</script>
	<!--end::Web font -->
	<!--begin::Base Styles -->
	<link href="{{asset('admin/vendors/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('admin/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('admin/style.css')}}" rel="stylesheet" type="text/css" />
	<!--end::Base Styles -->
	<link rel="shortcut icon" href="{{asset('admin/logo.ico')}}" />
</head>
<!-- end::Head -->
@include('panel-admin.coreAdmin.alert')
<!-- begin::Body -->
@yield('content')
<!-- end::Body -->

</html>