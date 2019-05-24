@extends('panel-admin.coreAdmin.index')
@section('title','contact')
@section('content')
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--singin m-login--2 m-login-2--skin-1" id="m_login" style="background-image: url({{asset('img/bg-admin/bg-1.png')}}); background-size: 100% 100vh;">
                <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
                    <div class="m-login__container">

                        <div class="m-login__logo">
                            <a href="#">
                                <img src="{{asset('img/logo/simaba4@4x.png')}}">
                            </a>
                        </div>
                        <div class="m-login__signin">
                            <div class="m-login__head">
                                <h3 class="m-login__title">
                                    Sign In To Admin
                                </h3>
                            </div>
							<form class="m-form m-form--state m-login__form" method="POST">
                                @csrf
                                <div class="form-group m-form__group {{ $errors->has('username') ? 'has-danger' : '' }}">
                                    <input class="form-control m-input {{ $errors->has('username') ? 'form-control-danger' : '' }}" type="text" name="username" placeholder="username" autocomplete="off" value="{{ old('username') }}">
                                    {!! $errors->first('username','<div class="form-control-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group m-form__group {{ $errors->has('password') ? 'has-danger' : '' }}">
                                    <input class="form-control m-input {{ $errors->has('password') ? 'form-control-danger' : '' }}"  type="password" name="password" placeholder="password">
                                    {!! $errors->first('password','<div class="form-control-feedback">:message</div>') !!}
                                </div>
                                <div class="m-login__form-action">
                                    <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
                                        Sign In
                                    </button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Page -->
        <!--begin::Base Scripts -->
        {{-- <script src="{{asset('admin/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script> --}}
        {{-- <script src="{{asset('admin/base/scripts.bundle.js')}}" type="text/javascript"></script> --}}
        <!--end::Base Scripts -->   
         
        <!--begin::Page Snippets -->
		{{-- <script src="{{asset('admin/snippets/pages/user/login.js')}}" type="text/javascript"></script> --}}
		<!--end::Page Snippets -->
    </body>
@endsection