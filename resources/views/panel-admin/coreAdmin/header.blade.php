
<!-- begin::Header -->
<header class="m-grid__item	m-grid m-grid--desktop m-grid--hor-desktop  m-header " >
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--hor-desktop m-container m-container--responsive m-container--xxl">
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-header__wrapper">
            <!-- begin::Brand -->
            <div class="m-grid__item m-brand">
                <div class="m-stack m-stack--ver m-stack--general m-stack--inline">
                    <div class="m-stack__item m-stack__item--middle m-brand__logo">
                        <a href="/dashboard" class="m-brand__logo-wrapper">
                            <img alt="" src="{{asset('img/logo/simaba4@4x.png')}}" style="height: 60px;width: 120px;"/>
                        </a>
                    </div>
                    <div class="m-stack__item m-stack__item--middle m-brand__tools m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light">
                
                        <!-- begin::Responsive Header Menu Toggler-->
                        <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                            <span></span>
                        </a>
                        <!-- end::Responsive Header Menu Toggler-->
                        @if ($menuKiri == true)
                            <a id="m_aside_left_offcanvas_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>
                        @endif
                        <!-- begin::Topbar Toggler-->
                        {{-- <a href="#" class="m-brand__icon m--visible-tablet-and-mobile-inline-block m-dropdown__toggle" data-dropdown-toggle="click">
                            <i class="flaticon-more"></i>
                        </a> --}}
                        <!--end::Topbar Toggler-->
                        
                        <div class="m-brand__icon m--visible-tablet-and-mobile-inline-block m-dropdown m-dropdown--medium" data-dropdown-toggle="click" aria-expanded="true">
                            <a href="#" class="m-brand__icon m-dropdown__toggle">
                                <i class="flaticon-more"></i>
                            </a>

                            <div class="m-dropdown__wrapper">
                                <div class="m-dropdown__inner">
                                    <div class="m-dropdown__header m--align-center" style="background: url({{asset('admin/user_profile_bg.jpg')}}); background-size: cover;">
                                        <div class="m-card-user m-card-user--skin-dark">
                                            <div class="m-card-user__pic">
                                                <img src="{{asset('admin/avatar.jpg')}}" class="m--img-rounded m--marginless" alt=""/>
                                            </div>
                                            <div class="m-card-user__details">
                                                <span class="m-card-user__name m--font-weight-500 mb-3">
                                                    Username
                                                </span>
                                                <a href="#" class="m-card-user__email m--font-weight-300 m-link">
                                                    Nama Devisi
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-dropdown__body">
                                        <div class="m-dropdown__content">
                                            <ul class="m-nav m-nav--skin-light">
                                                <li class="m-nav__item">
                                                    <a href="#" class="m-nav__link">
                                                        <i class="m-nav__link-icon flaticon-info"></i>
                                                        <span class="m-nav__link-text">
                                                            FAQ
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-nav__separator m-nav__separator--fit"></li>
                                                <li class="m-nav__item">
                                                    <a href="#" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                        Logout
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end::Brand -->                                        					
            <!-- begin::Topbar -->
            <div class="m-grid__item m-grid__item--fluid m-header-head" id="m_header_nav">
                <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                    <div class="m-stack__item m-topbar__nav-wrapper">
                        <ul class="m-topbar__nav m-nav m-nav--inline">
                            <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-topbar__welcome m--hidden-tablet m--hidden-mobile">
                                        Hello,&nbsp;
                                    </span>
                                    <span class="m-topbar__username m--hidden-tablet m--hidden-mobile m--padding-right-15">
                                        <span class="m-link">
                                            Username
                                        </span>
                                    </span>
                                    <span class="m-topbar__userpic">
                                        <img src="{{asset('admin/avatar.jpg')}}" class="m--img-rounded m--marginless m--img-centered" alt=""/>
                                    </span>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    {{-- <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span> --}}
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__header m--align-center" style="background: url({{asset('admin/user_profile_bg.jpg')}}); background-size: cover;">
                                            <div class="m-card-user m-card-user--skin-dark">
                                                <div class="m-card-user__pic">
                                                    <img src="{{asset('admin/avatar.jpg')}}" class="m--img-rounded m--marginless" alt=""/>
                                                </div>
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name m--font-weight-500">
                                                        Username
                                                    </span>
                                                    <a href="#" class="m-card-user__email m--font-weight-300 m-link">
                                                        Nama Devisi
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav m-nav--skin-light">
                                                    <li class="m-nav__item">
                                                        <a href="/Faq" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">
                                                                FAQ
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                                    <li class="m-nav__item">
                                                        <a href="#" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                            Logout
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end::Topbar -->
        </div>
    </div>
</header>
<!-- end::Header -->