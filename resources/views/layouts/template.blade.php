<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/logo.ico') }}" />
    @yield('css')
    <!-- JQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Slick JS -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Zoom JS -->
    <script type="text/javascript" src="{{ asset('js/jquery.zoom.min.js') }}"></script>
    <!-- Moment JS -->
    <script src="https://cdn.jsdelivr.net/npm/moment@2.24.0/moment.min.js"></script>
    <!-- Javascript -->
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
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