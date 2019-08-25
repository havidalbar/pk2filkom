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
                            value="{{ old('bidang') ??  $mahasiswa->kelompok_pkm->bidang ?? '' }}" required>
                        <button class="btn btn-block btn-dropdown-pkm dropdown-toggle" type="button"
                            {{ $mahasiswa->kelompok_pkm ? 'disabled' : '' }} id="dropdown-bidang-pkm"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (($mahasiswa->kelompok_pkm && $mahasiswa->kelompok_pkm->bidang) || old('bidang'))
                            {{'PKM-'.(old('bidang') ?? $mahasiswa->kelompok_pkm->bidang)}}
                            @else
                            {!! 'Pilih Bidang PKM' !!}
                            @endif
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdown-bidang-pkm">
                            @foreach ($bidangs as $dataBidang)
                            <li>
                                <div data-value="{{ $dataBidang->bidang }}">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-6">
                                            <div class="nama-bidang-pkm">PKM-{{ $dataBidang->bidang }}</div>
                                            <div class="deskripsi-bidang-pkm">PKM-{{ $dataBidang->panjang }}</div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="kuota-bidang-pkm">Sisa Kuota : {{ $dataBidang->sisa_kuota }} tim
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <div class="dropdown-divider"></div>
                            @endforeach
                        </ul>
                    </div>
                </div>
                {!! $errors->first('bidang','<div class="pkm-error">:message</div>') !!}
                <div class="divider-pendataan-pkm"></div>
                <div class="data-anggota-pkm">
                    <div class="judul-text">Data Anggota</div>
                    <div class="identitas-container">
                        <div class="posisi-anggota">KETUA TIM</div>
                        @if ($mahasiswa->kelompok_pkm)
                        <div class="form-group row">
                            <label class="col-md-2">Nama</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="nama_ketua"
                                    placeholder="Masukkan Nama Ketua Tim" disabled
                                    value="{{ $mahasiswa->kelompok_pkm->ketua->nama ?? '' }}">
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label class="col-md-2">NIM</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control set-disable" name="nim_ketua"
                                    placeholder="Masukkan NIM Ketua Tim"
                                    {{ $mahasiswa->kelompok_pkm ? 'disabled' : '' }}
                                    value="{{ old('nim_ketua') ?? ($mahasiswa->kelompok_pkm ? $mahasiswa->kelompok_pkm->ketua->nim : '') }}">
                            </div>
                        </div>
                        @if ($mahasiswa->kelompok_pkm)
                        <div class="form-group row">
                            <label class="col-md-2">Prodi</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="prodi_ketua"
                                    placeholder="Masukkan Prodi Ketua Tim" disabled
                                    value="{{ $mahasiswa->kelompok_pkm->ketua->prodi ?? '' }}">
                            </div>
                        </div>
                        @endif
                        {!! $errors->first('nim_ketua','<div class="pkm-error">:message</div>') !!}
                    </div>
                    <div class="identitas-container">
                        <div class="posisi-anggota">ANGGOTA 1</div>
                        @if ($mahasiswa->kelompok_pkm)
                        <div class="form-group row">
                            <label class="col-md-2">Nama</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="nama_anggota1"
                                    placeholder="Masukkan Nama Anggota 1" disabled
                                    value="{{ $mahasiswa->kelompok_pkm->anggota1->nama ?? '' }}">
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label class="col-md-2">NIM</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control set-disable" name="nim_anggota1"
                                    placeholder="Masukkan NIM anggota 1"
                                    {{ $mahasiswa->kelompok_pkm ? 'disabled' : '' }}
                                    value="{{ old('nim_anggota1') ?? $mahasiswa->kelompok_pkm->anggota1->nim ?? '' }}">
                            </div>
                        </div>
                        @if ($mahasiswa->kelompok_pkm)
                        <div class="form-group row">
                            <label class="col-md-2">Prodi</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="prodi_anggota1"
                                    placeholder="Masukkan Prodi Anggota 1" disabled
                                    value="{{ $mahasiswa->kelompok_pkm->anggota1->prodi ?? '' }}">
                            </div>
                        </div>
                        @endif
                        {!! $errors->first('nim_anggota1','<div class="pkm-error">:message</div>') !!}
                    </div>
                    <div class="identitas-container">
                        <div class="posisi-anggota">ANGGOTA 2</div>
                        @if ($mahasiswa->kelompok_pkm)
                        <div class="form-group row">
                            <label class="col-md-2">Nama</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="nama_anggota_2"
                                    placeholder="Masukkan nama anggota 2" disabled
                                    value="{{ $mahasiswa->kelompok_pkm->anggota2->nama ?? '' }}">
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label class="col-md-2">NIM</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control set-disable" name="nim_anggota2"
                                    placeholder="Masukkan NIM anggota 2"
                                    {{ $mahasiswa->kelompok_pkm ? 'disabled' : '' }}
                                    value="{{ old('nim_anggota2') ?? $mahasiswa->kelompok_pkm->anggota2->nim ?? '' }}">
                            </div>
                        </div>
                        @if ($mahasiswa->kelompok_pkm)
                        <div class="form-group row">
                            <label class="col-md-2">Prodi</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="prodi_anggota2"
                                    placeholder="Masukkan Prodi Anggota 2" disabled
                                    value="{{ $mahasiswa->kelompok_pkm->anggota2->prodi ?? '' }}">
                            </div>
                        </div>
                        @endif
                        {!! $errors->first('nim_anggota2','<div class="pkm-error">:message</div>') !!}
                    </div>
                </div>
                <div class="divider-pendataan-pkm"></div>
                @if ($penugasan->jenis == 8)
                <div class="abstraksi-pkm">
                    <div class="judul-text">Abstraksi PKM</div>
                    <textarea class="textarea-abstraksi set-disable" name="abstraksi"
                        placeholder="Masukkan abstraksi PKM">{{ old('abstraksi') ?? $jawabanAbstraksi->jawaban ?? '' }}</textarea>
                    {!! $errors->first('abstraksi','<div class="pkm-error">:message</div>') !!}
                </div>

                @elseif ($penugasan->jenis == 9)
                <div class="link-kumpul">
                    <div class="judul-text">Link Kumpul</div>
                    @foreach ($penugasan->soal as $index => $soal)
                    <label for="" class="link-deskripsi">
                        {{ $soal->soal }}
                    </label>
                    <input type="hidden" class="form-control set-disable" name="jawaban[{{ $index }}][id]"
                        value="{{ $soal->id }}">
                    <input type="text" class="form-control set-disable" name="jawaban[{{ $index }}][url]"
                        placeholder="{{ $soal->soal }}" value="{{ old('link_kumpul') ?? '' }}">
                    @foreach ($errors->get('jawaban.' . $index . '*') as $message)
                    <div class="pkm-error">
                        {{ $message[0] }}
                    </div>
                    @endforeach
                    @endforeach
                </div>
                @endif
                <div class="d-flex justify-content-center">
                    @if (($jawabanAbstraksi && $jawabanAbstraksi->kelompok->bidang))
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