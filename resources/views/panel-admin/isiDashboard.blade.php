@extends('panel-admin.dashboard', ['menuKiri' => false])
@section('isiKontent')
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-body__content">
        <div class="m-grid__item m-grid__item--fluid m-wrapper py-3">
            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title" style="transform: translateY(-11px);">
                            Dashboard
                        </h3>
                    </div>
                </div>
            </div>
            <!-- END: Subheader -->
            <div class="m-content p-0">
                {{-- awal --}}
                
                <div class="row">
                    <div class="col-md-6">
                            <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon">
                                                <i class="flaticon-line-graph"></i>
                                            </span>
                                            <h3 class="m-portlet__head-text">
                                                INFORMASI PERIHAL UNGGAH REKAP PENILAIAN DI PANEL
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__body p-3">
                                    <ul>
                                        <li><strong>Format file rekap penilaian :</strong></li>
                                        <ul>
                                            <li>
                                                Untuk unggah data penilaian (Absensi, Keaktifan, dan Pelangggaran) rangkaian PK2Maba ada formatnya. Unduh formatnya <strong><a title="Unduh Format File Rekap Penilaian Rangkaian PK2Maba 2018 (Hari 1 &amp; 2)" href="https://simaba-filkom.ub.ac.id/assets/dokumen/d977e0a429e4858d564f82ca9032edd4/format_rekap_penilaian_pk2maba.zip">DI SINI</a></strong>
                                            </li>
                                            <li>
                                                .... dan untuk format file penilaian rangkaian selanjutnya masih <i>on progress</i>
                                            </li>
                                        </ul>
                                        <hr>
                                        <strong style="color: red;">[ Informasi Tambahan ]</strong>
                                        <li><strong>Diharapkan untuk tidak mengubah konten</strong> yang ada di bagian <i>heading table</i> atau <i>heading column</i> dari format file excel</li>
                                        <li>Adapun beberapa faktor apabila pada saat proses unggah file terjadi <i>ERROR</i>. Sebagai berikut :</li>
                                            <ul>
                                                <li><strong>NIM</strong> yang dimasukkan ke dalam file excel atau rekap penilaian <strong>belum ada di dalam <abbr title="(table : mahasiswa_baru)">database</abbr></strong>. <strong>Cara mengatasinya, NIM harus di <abbr title="oleh Divisi PIT"><i>INSERT manual</i></abbr></strong> terlebih dahulu lewat PHPMyAdmin atau semacamnya</li>
                                                <li>Jika beberapa <strong>kolom kosong</strong> lebih disarankan <strong>diisi dengan angka 0</strong></li>
                                            </ul>
                                    </ul>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi my-2">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon m--hide">
                                            <i class="flaticon-statistics"></i>
                                        </span>
                                        <h3 class="m-portlet__head-text">
                                            Portlet sub title goes here
                                        </h3>
                                        <h2 class="m-portlet__head-label m-portlet__head-label--success">
                                            <span>
                                                Events
                                            </span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                                    
                            <div class="m-portlet__body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
                            </div>
                        </div>
                    </div>
                </div>
                {{-- akhir --}}
            </div>
        </div>
    </div>
@endsection