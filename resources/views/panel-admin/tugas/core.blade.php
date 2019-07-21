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
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#jumlahSoal" class="m-menu__link">
                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                            <span></span>
                        </i>
                        <span class="m-menu__link-text">
                            Tambah Tugas
                        </span>
                    </a>
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
<!-- Modal Jumlah Soal Pilgan -->
<div class="modal fade" id="jumlahSoal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('panel.penugasan.create') }}" method="get">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group m-form__group row align-items-center">
                        <div class="col">
                            <label for="tipe_soal">
                                Tipe Soal
                            </label>
                            <select name="tipe_soal" id="tipe_soal" onchange="triggerJumlahSoal()">
                                <option selected disabled value="">Pilih Tipe Soal</option>
                                <option value="instagram">Link Instagram</option>
                                <option value="line">Link LINE</option>
                                <option value="youtube">Link Youtube</option>
                                <option value="pilgan">Pilihan Ganda</option>
                                <option value="offline">Penugasan Offline</option>
                                <option value="tts">Teka-Teki Silang</option>
                            </select>
                            <br>
                            <div id="jumlah-soal-parent">
                                <label for="jumlah_soal">
                                    Jumlah Soal
                                </label>
                                <input class="form-control m-input" id="jumlah_soal" name="jumlah_soal" type="number"
                                    min="1" placeholder="Masukkan Jumlah Soal" required>
                            </div>
                        </div>
                    </div>
                    <script>
                        function triggerJumlahSoal() {
                            let jumlahSoalParent = $('#jumlah-soal-parent');
                            if ($('#tipe_soal').val() == 'offline') {
                                jumlahSoalParent.empty();
                            } else if (!$('#jumlah_soal').length) {
                                jumlahSoalParent.append(`
                                    <label for="jumlah_soal">
                                        Jumlah Soal
                                    </label>
                                    <input class="form-control m-input" id="jumlah_soal" name="jumlah_soal" type="number"
                                        min="1" placeholder="Masukkan Jumlah Soal" required>
                                `);
                            }
                        }
                    </script>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Lanjutkan</button>
                    <!-- <a href="{{ route('panel.penugasan.create', ['jenis' => 'pilgan']) }}"></a> -->
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Akhir Modal Jumlah Soal Pilgan -->
@endsection