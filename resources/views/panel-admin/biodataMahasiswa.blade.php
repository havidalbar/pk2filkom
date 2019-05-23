@extends('panel-admin.dashboard', ['menuKiri' => false])
@section('isiKontent')
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-body__content">
        @yield('assideKontent')
    </div>
@endsection