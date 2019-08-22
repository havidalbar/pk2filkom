@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->
<div class="jumbotron jumbotron-fluid bg-kumpul-video-ig">
    <div class="container">
        <h1 class="titleKumpulVideo">{{ $penugasan->judul }}</h1>
        <div class="garisPendataanPkm"></div>
        <div class="container bg-pendataan-pkm">
            <form class="form-pendataan-pkm" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="dropdown">
                        <input id="pilih-bidang-pkm" type="hidden" name="bidang"
                            value="{{ old('bidang') ??  $jawabanAbstraksi->kelompok->bidang ?? '' }}" required>
                        <button class="btn btn-block btn-dropdown-pkm dropdown-toggle" type="button"
                            id="dropdown-bidang-pkm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            disabled={{$jawabanAbstraksi ? true : false}}>
                            @if (($jawabanAbstraksi && $jawabanAbstraksi->kelompok->bidang) || old('bidang'))
                            {{'PKM-'.(old('bidang') ?? $jawabanAbstraksi->kelompok->bidang)}}
                            @else
                            {!! 'Pilih Bidang PKM' !!}
                            @endif
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdown-bidang-pkm">
                            <li>
                                <div data-value="GT">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-6">
                                            <div class="nama-bidang-pkm">PKM-GT</div>
                                            <div class="deskripsi-bidang-pkm">PKM-Gagasan Tertulis</div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="kuota-bidang-pkm">Sisa Kuota : 45 tim</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <div data-value="KC">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-6">
                                            <div class="nama-bidang-pkm">PKM-KC</div>
                                            <div class="deskripsi-bidang-pkm">PKM-Karsa Cipta</div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="kuota-bidang-pkm">Sisa Kuota : 35 tim</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <div data-value="T">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-6">
                                            <div class="nama-bidang-pkm">PKM-T</div>
                                            <div class="deskripsi-bidang-pkm">PKM-Teknologi</div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="kuota-bidang-pkm">Sisa Kuota : 35 tim</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <div data-value="M">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-6">
                                            <div class="nama-bidang-pkm">PKM-M</div>
                                            <div class="deskripsi-bidang-pkm">PKM-Pengabdian Masyarakat</div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="kuota-bidang-pkm">Sisa Kuota : 35 tim</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <div data-value="K">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-6">
                                            <div class="nama-bidang-pkm">PKM-K</div>
                                            <div class="deskripsi-bidang-pkm">PKM-Kewirausahaan</div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="kuota-bidang-pkm">Sisa Kuota : 35 tim</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <div data-value="PE">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-6">
                                            <div class="nama-bidang-pkm">PKM-PE</div>
                                            <div class="deskripsi-bidang-pkm">PKM-Penelitian Eksakta</div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="kuota-bidang-pkm">Sisa Kuota : 25 tim</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <div data-value="PSH">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-6">
                                            <div class="nama-bidang-pkm">PKM-PSH</div>
                                            <div class="deskripsi-bidang-pkm">PKM-Penelitian Sosial Humaniora</div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="kuota-bidang-pkm">Sisa Kuota : 25 tim</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <div data-value="GFK">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-6">
                                            <div class="nama-bidang-pkm">PKM-GFK</div>
                                            <div class="deskripsi-bidang-pkm">PKM-Gagasan Futuristik Konstruktif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="kuota-bidang-pkm">Sisa Kuota : 15 tim</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="divider-pendataan-pkm"></div>
                <div class="data-anggota-pkm">
                    <div class="judul-text">Data Anggota</div>
                    <div class="identitas-container">
                        <div class="posisi-anggota">KETUA TIM</div>
                        {{-- <div class="form-group row">
                            <label class="col-md-2">Nama</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="nama_ketua"
                                    placeholder="Masukkan Nama Ketua Tim">
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-md-2">NIM</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="nim_ketua"
                                    placeholder="Masukkan NIM Ketua Tim"
                                    value="{{ old('nim_ketua') ??  $jawabanAbstraksi->kelompok->ketua->nim ?? '' }}"
                                    disabled={{$jawabanAbstraksi ? true : false}}>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-md-2">Prodi</label>
                            <div class="col-md-10">
                                <div class="dropdown">
                                    <input class="pilih-prodi" id="pilih-prodi-1" type="hidden" name="prodi_ketua"
                                        required>
                                    <button class="btn btn-block btn-dropdown-prodi dropdown-toggle" type="button"
                                        id="dropdown-pilih-prodi" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Pilih Prodi Ketua Tim
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdown-pilih-prodi-1">
                                        <li>
                                            <div data-value="tif">Teknik Informatika</div>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <div data-value="tekkom">Teknik Komputer</div>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <div data-value="si">Sistem Informasi</div>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <div data-value="ti">Teknologi Informasi</div>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <div data-value="pti">Pendidikan Teknologi Informasi</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="identitas-container">
                        <div class="posisi-anggota">ANGGOTA 1</div>
                        {{-- <div class="form-group row">
                            <label class="col-md-2">Nama</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="nama_anggota_1"
                                    placeholder="Masukkan nama anggota 1">
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-md-2">NIM</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="nim_anggota1"
                                    placeholder="Masukkan NIM anggota 1"
                                    value="{{ old('nim_anggota1') ??  $jawabanAbstraksi->kelompok->anggota1->nim ?? '' }}"
                                    disabled={{$jawabanAbstraksi ? true : false}}>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-md-2">Prodi</label>
                            <div class="col-md-10">
                                <div class="dropdown">
                                    <input class="pilih-prodi" id="pilih-prodi-1" type="hidden" name="prodi_anggota_1"
                                        required>
                                    <button class="btn btn-block btn-dropdown-prodi dropdown-toggle" type="button"
                                        id="dropdown-pilih-prodi" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Pilih Prodi Ketua Tim
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdown-pilih-prodi-1">
                                        <li>
                                            <div data-value="tif">Teknik Informatika</div>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <div data-value="tekkom">Teknik Komputer</div>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <div data-value="si">Sistem Informasi</div>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <div data-value="ti">Teknologi Informasi</div>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <div data-value="pti">Pendidikan Teknologi Informasi</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="identitas-container">
                        <div class="posisi-anggota">ANGGOTA 2</div>
                        {{-- <div class="form-group row">
                            <label class="col-md-2">Nama</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="nama_anggota_2"
                                    placeholder="Masukkan nama anggota 2">
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-md-2">NIM</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="nim_anggota2"
                                    placeholder="Masukkan NIM anggota 2"
                                    value="{{ old('nim_anggota2') ??  $jawabanAbstraksi->kelompok->anggota2->nim ?? '' }}"
                                    disabled={{$jawabanAbstraksi ? true : false}}>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-md-2">Prodi</label>
                            <div class="col-md-10">
                                <div class="dropdown">
                                    <input class="pilih-prodi" id="pilih-prodi-1" type="hidden" name="prodi_anggota_2"
                                        required>
                                    <button class="btn btn-block btn-dropdown-prodi dropdown-toggle" type="button"
                                        id="dropdown-pilih-prodi" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Pilih Prodi Ketua Tim
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdown-pilih-prodi-1">
                                        <li>
                                            <div data-value="tif">Teknik Informatika</div>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <div data-value="tekkom">Teknik Komputer</div>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <div data-value="si">Sistem Informasi</div>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <div data-value="ti">Teknologi Informasi</div>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <div data-value="pti">Pendidikan Teknologi Informasi</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="divider-pendataan-pkm"></div>
                <div class="abstraksi-pkm">
                    <div class="judul-text">Abstraksi PKM</div>
                    <textarea class="textarea-abstraksi" name="abstraksi" placeholder="Masukkan abstraksi PKM"
                        disabled={{$jawabanAbstraksi ? true : false}}>{{ old('abstraksi') ?? $jawabanAbstraksi->jawaban }}</textarea>
                </div>
                <div class="d-flex justify-content-center">
                    @if (($jawabanAbstraksi && $jawabanAbstraksi->kelompok->bidang) || old('bidang'))
                    <a href="{{route('mahasiswa.penugasan-kelompok-pkm.index')}}" class="btn btn-submit-pkm">Kembali</a>
                    @else
                    <button type="submit" class="btn btn-submit-pkm">Submit</button>
                    @endif
                </div>
            </form>
            <div class="d-flex justify-content-center">
                <div class="detail-tugas">
                    {!! $penugasan->deskripsi !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection