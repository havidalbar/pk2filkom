<div class="m-grid__item m-body__nav">
	<div class="m-stack m-stack--ver m-stack--desktop">
		<!-- begin::Horizontal Menu -->
		<div class="m-stack__item m-stack__item--middle m-stack__item--fluid">
			<button class="m-aside-header-menu-mobile-close m-aside-header-menu-mobile-close--skin-light"
				id="m_aside_header_menu_mobile_close_btn">
				<i class="la la-close"></i>
			</button>
			<div id="m_header_menu"
				class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light">
				<ul class="m-menu__nav m-menu__nav--submenu-arrow">
					<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
						<a href="{{ route('panel.dashboard') }}" class="m-menu__link ">
							<span class="m-menu__item-here"></span>
							<span class="m-menu__link-text">
								Dashboard
							</span>
						</a>
					</li>

					<!-- <li class="m-menu__item m-menu__item--submenu m-menu__item--rel" data-menu-submenu-toggle="click" aria-haspopup="true">
                        <a href="#" class="m-menu__link m-menu__toggle">
                            <span class="m-menu__item-here"></span>
                            <span class="m-menu__link-text">
                                Agenda
                            </span>
                            <i class="m-menu__hor-arrow la la-angle-down"></i>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                            <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                            <ul class="m-menu__subnav">
                                <li class="m-menu__item" data-redirect="true" aria-haspopup="true">
                                    <a href="/kegiatan" class="m-menu__link">
                                        <i class="m-menu__link-icon flaticon-users"></i>
                                        <span class="m-menu__link-text">
                                            KEGIATAN
                                        </span>
                                    </a>
                                </li>
                                <li class="m-menu__item" data-redirect="true" aria-haspopup="true">
                                    <a href="/rangkaian" class="m-menu__link">
                                        <i class="m-menu__link-icon flaticon-users"></i>
                                        <span class="m-menu__link-text">
                                            RANGKAIAN
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
					</li> -->
					@if (Session::get('is_full_access') || Session::get('divisi') == 'HUMAS')
					<li class="m-menu__item m-menu__item--submenu m-menu__item--rel" data-menu-submenu-toggle="click"
						data-redirect="true" aria-haspopup="true">
						<a href="#" class="m-menu__link m-menu__toggle">
							<span class="m-menu__item-here"></span>
							<span class="m-menu__link-text">
								Publikasi
							</span>
							<i class="m-menu__hor-arrow la la-angle-down"></i>
							<i class="m-menu__ver-arrow la la-angle-right"></i>
						</a>
						<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
							<span class="m-menu__arrow m-menu__arrow--adjust"></span>
							<ul class="m-menu__subnav">
								<!-- UNUSED FUNCTION : [Fadhil]
									<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
									<a href="route('panel.kategori.index')" class="m-menu__link">
										<i class="m-menu__link-icon la la-tags"></i>
										<span class="m-menu__link-text">
											KATEGORI
										</span>
									</a>
								</li> -->
								<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
									<a href="{{ route('panel.artikel.index') }}" class="m-menu__link">
										<i class="m-menu__link-icon la la-pencil-square-o"></i>
										<span class="m-menu__link-text">
											ARTIKEL
										</span>
									</a>
								</li>
								<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
									<a href="{{ route('panel.faq.index') }}" class="m-menu__link">
										<i class="m-menu__link-icon flaticon-info"></i>
										<span class="m-menu__link-text">
											FAQ
										</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
					@endif

					<li class="m-menu__item m-menu__item--submenu m-menu__item--rel" data-menu-submenu-toggle="click"
						aria-haspopup="true">
						<a href="#" class="m-menu__link m-menu__toggle">
							<span class="m-menu__item-here"></span>
							<span class="m-menu__link-text">
								Rekap Kegiatan
							</span>
							<i class="m-menu__hor-arrow la la-angle-down"></i>
							<i class="m-menu__ver-arrow la la-angle-right"></i>
						</a>
						<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
							<span class="m-menu__arrow m-menu__arrow--adjust"></span>
							<ul class="m-menu__subnav">
								<li class="m-menu__item m-menu__item--submenu" data-menu-submenu-toggle="hover"
									data-redirect="true" aria-haspopup="true">
									<a href="#" class="m-menu__link m-menu__toggle">
										<i class="m-menu__link-icon la la-list-alt"></i>
										<span class="m-menu__link-text">
											PK2MABA
										</span>
										<i class="m-menu__hor-arrow la la-angle-right"></i>
										<i class="m-menu__ver-arrow la la-angle-right"></i>
									</a>
									<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
										<span class="m-menu__arrow"></span>
										<ul class="m-menu__subnav">
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="{{ route('panel.kegiatan.pk2maba.absensi.index') }}"
													class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														Absensi
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="{{ route('panel.kegiatan.pk2maba.keaktifan.index') }}"
													class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														Keaktifan
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="/pk2Tugas" class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														Tugas
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="{{ route('panel.kegiatan.pk2maba.pelanggaran.index') }}"
													class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														Pelanggaran
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="{{ route('panel.kegiatan.pk2maba.total') }}"
													class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														Total
													</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="m-menu__item m-menu__item--submenu" data-menu-submenu-toggle="hover"
									data-redirect="true" aria-haspopup="true">
									<a href="#" class="m-menu__link m-menu__toggle">
										<i class="m-menu__link-icon la la-list-alt"></i>
										<span class="m-menu__link-text">
											STARTUP ACADEMY
										</span>
										<i class="m-menu__hor-arrow la la-angle-right"></i>
										<i class="m-menu__ver-arrow la la-angle-right"></i>
									</a>
									<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
										<span class="m-menu__arrow"></span>
										<ul class="m-menu__subnav">
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="{{ route('panel.kegiatan.startup.absensi.index') }}"
													class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														ABSENSI
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="{{ route('panel.kegiatan.startup.keaktifan.index') }}"
													class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														KEAKTIFAN
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="{{ route('panel.kegiatan.startup.tugas.index') }}"
													class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														TUGAS
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="{{ route('panel.kegiatan.startup.tugas.deep-talk') }}"
													class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														TUGAS DEEP TALK
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="{{ route('panel.kegiatan.startup.tugas.filkom-tv') }}"
													class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														TUGAS FILKOM TV
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="{{ route('panel.kegiatan.startup.pelanggaran.index') }}"
													class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														Pelanggaran
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="{{ url('/panel/kegiatan/startup/total') }}"
													class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														Total
													</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="m-menu__item m-menu__item--submenu" data-menu-submenu-toggle="hover"
									data-redirect="true" aria-haspopup="true">
									<a href="#" class="m-menu__link m-menu__toggle">
										<i class="m-menu__link-icon la la-list-alt"></i>
										<span class="m-menu__link-text">
											PK2M TOUR
										</span>
										<i class="m-menu__hor-arrow la la-angle-right"></i>
										<i class="m-menu__ver-arrow la la-angle-right"></i>
									</a>
									<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
										<span class="m-menu__arrow"></span>
										<ul class="m-menu__subnav">
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="{{ route('panel.kegiatan.pkm.absensi.index') }}" class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														ABSENSI
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="{{ route('panel.kegiatan.pkm.keaktifan.index') }}" class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														KEAKTIFAN
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="/pkmKelompok" class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														KELOMPOK
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="/pkmTugas" class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														TUGAS
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="/pkmTugasAbstraksi" class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														TUGAS ABSTRAKSI
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="{{ route('panel.kegiatan.pkm.pelanggaran.index') }}" class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														PELANGGARAN
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="{{ url('/panel/kegiatan/pkm/total') }}"
													class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														Total
													</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="m-menu__item m-menu__item--submenu" data-menu-submenu-toggle="hover"
									data-redirect="true" aria-haspopup="true">
									<a href="#" class="m-menu__link m-menu__toggle">
										<i class="m-menu__link-icon la la-list-alt"></i>
										<span class="m-menu__link-text">
											TINGKAT PRODI
										</span>
										<i class="m-menu__hor-arrow la la-angle-right"></i>
										<i class="m-menu__ver-arrow la la-angle-right"></i>
									</a>
									<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
										<span class="m-menu__arrow"></span>
										<ul class="m-menu__subnav">
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="{{ route('panel.kegiatan.prodi.index') }}" class="m-menu__link">
													<i class="m-menu__link-icon la la-file-text-o"></i>
													<span class="m-menu__link-text">
														FINAL
													</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</li>

					<li class="m-menu__item m-menu__item--submenu m-menu__item--rel m-menu__item--more m-menu__item--icon-only"
						data-menu-submenu-toggle="click" data-redirect="true" aria-haspopup="true">
						<a href="#" class="m-menu__link m-menu__toggle">
							<span class="m-menu__item-here"></span>
							<i class="m-menu__link-icon flaticon-more-v3"></i>
							<span class="m-menu__link-text"></span>
						</a>
						<div
							class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left m-menu__submenu--pull">
							<span class="m-menu__arrow m-menu__arrow--adjust"></span>
							<ul class="m-menu__subnav">
								<li class="m-menu__item  m-menu__item--submenu" data-menu-submenu-toggle="hover"
									data-redirect="true" aria-haspopup="true">
									<a href="#" class="m-menu__link m-menu__toggle">
										<i class="m-menu__link-icon la la-users"></i>
										<span class="m-menu__link-text">
											MAHASISWA
										</span>
										<i class="m-menu__hor-arrow la la-angle-right"></i>
										<i class="m-menu__ver-arrow la la-angle-right"></i>
									</a>
									<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
										<span class="m-menu__arrow"></span>
										<ul class="m-menu__subnav">
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="{{ route('panel.mahasiswa.biodata') }}" class="m-menu__link">
													<i class="m-menu__link-icon la la-user"></i>
													<span class="m-menu__link-text">
														BIODATA
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="{{ route('panel.mahasiswa.kesehatan') }}"
													class="m-menu__link">
													<i class="m-menu__link-icon la la-user-md"></i>
													<span class="m-menu__link-text">
														KESEHATAN
													</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="m-menu__item m-menu__item--submenu" data-menu-submenu-toggle="hover"
									data-redirect="true" aria-haspopup="true">
									<a href="#" class="m-menu__link m-menu__toggle">
										<i class="m-menu__link-icon flaticon-chat-1"></i>
										<span class="m-menu__link-text">
											PENUGASAN
										</span>
										<i class="m-menu__hor-arrow la la-angle-right"></i>
										<i class="m-menu__ver-arrow la la-angle-right"></i>
									</a>
									<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
										<span class="m-menu__arrow"></span>
										<ul class="m-menu__subnav">
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="inner.html" class="m-menu__link">
													<i class="m-menu__link-icon flaticon-chat-1"></i>
													<span class="m-menu__link-text">
														DAFTAR PENUGASAAN
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="inner.html" class="m-menu__link">
													<i class="m-menu__link-icon flaticon-chat-1"></i>
													<span class="m-menu__link-text">
														PILIHAN GANDA SESI 1
													</span>
												</a>
											</li>
											<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
												<a href="inner.html" class="m-menu__link">
													<i class="m-menu__link-icon flaticon-chat-1"></i>
													<span class="m-menu__link-text">
														PILIHAN GANDA SESI 2
													</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
									<a href="{{ route('panel.pengguna.index') }}" class="m-menu__link">
										<i class="m-menu__link-icon la la-user-secret"></i>
										<span class="m-menu__link-text">
											PENGGUNA
										</span>
									</a>
								</li>
								<li class="m-menu__item" data-redirect="true" aria-haspopup="true">
									<a href="{{ route('panel.nilai-kkm.index') }}" class="m-menu__link">
										<i class="m-menu__link-icon la la-bar-chart-o"></i>
										<span class="m-menu__link-text">
											NILAI KKM
										</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!-- end::Horizontal Menu -->
	</div>
</div>
