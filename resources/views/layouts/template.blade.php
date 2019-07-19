<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('admin/logo.ico')}}" />
	@yield('css')
	<!-- JQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
	<script src="{{asset('js/popper.min.js')}}"></script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- Javascript -->
	<script src="{{asset('js/script.js')}}"></script>
	@yield('js')
</head>

<body>
	@if (session('alert'))
	<script>
		alert('{{ session('alert') }}');
	</script>
	@endif
	@yield('content')
</body>

</html>
