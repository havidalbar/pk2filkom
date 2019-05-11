<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (\Session::has('alert'))
        <p>{!! \Session::get('alert') !!}</p>
    @endif
    @if (\Session::has('nim'))
    <p>{{\Session::get('nim')}}</p>
    <p>{{\Session::get('nama')}}</p>
    <p>{{\Session::get('jurusan')}}</p>
    <p>{{\Session::get('prodi')}}</p>
    <img src="{{\Session::get('foto')}}" /><br>
    <a href="/logout">Keluar</a>
    @else
    <a href="/login">Masuk</a>
    @endif
</body>
</html>