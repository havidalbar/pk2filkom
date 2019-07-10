@extends('panel-admin.dashboard', ['menuKiri' => true])
@section('isiKontent')
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-body__content">
	<!-- BEGIN: Left Aside -->
	<button class="m-aside-left-close m-aside-left-close--skin-light" id="m_aside_left_close_btn">
		<i class="la la-close"></i>
	</button>
	<div id="m_aside_left" class="m-grid__item m-aside-left">
		<!-- BEGIN: Aside Menu -->
		<div id="m_ver_menu" class="m-aside-menu m-aside-menu--skin-light m-aside-menu--submenu-skin-light"
			data-menu-vertical="true" data-menu-scrollable="false" data-menu-dropdown-timeout="500">
			<ul class="m-menu__nav m-menu__nav--dropdown-submenu-arrow">
				<li class="m-menu__section">
					<h4 class="m-menu__section-text">
						Tugas
					</h4>
					<i class="m-menu__section-icon flaticon-more-v3"></i>
				</li>
				<li class="m-menu__item" aria-haspopup="true" data-redirect="true">
					<div class="m-menu__link">
						<i class="m-menu__link-bullet m-menu__link-bullet--dot">
							<span></span>
						</i>
						<div class="dropdown">
							<div class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								aria-expanded="false">Tambah Tugas<span class="caret"></span></div>
							<ul class="dropdown-menu">
								<li class="dropdown-header" style="font-size:14px;text-align:center">Tipe Tugas</li>
								<li><a href="{{ route('panel.penugasan.create', ['jenis' => 'link']) }}">Link</a></li>
								<li>
									<a href="{{ route('panel.penugasan.create', ['jenis' => 'pilgan']) }}">
										Pilihan Ganda
									</a>
								</li>
							</ul>
						</div>
					</div>
				</li>
				<li class="m-menu__item" aria-haspopup="true" data-redirect="true">
					<a href="{{ route('panel.penugasan.index') }}" class="m-menu__link">
						<i class="m-menu__link-bullet m-menu__link-bullet--dot">
							<span></span>
						</i>
						<span class="m-menu__link-text">
							Data Tugas
						</span>
					</a>
				</li>
			</ul>
		</div>
		<!-- END: Aside Menu -->
	</div>
	<!-- END: Left Aside -->
	@yield('assideKontent')
</div>
@endsection