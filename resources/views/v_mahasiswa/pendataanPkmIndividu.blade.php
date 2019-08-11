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
                        <input id="pilih-bidang-pkm" type="hidden" name="bidang" required>
                        <button class="btn btn-block btn-dropdown-pkm dropdown-toggle" type="button"
                            id="dropdown-bidang-pkm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pilih Bidang PKM
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
                                            <div class="kuota-bidang-pkm">Kuota : 45 tim</div>
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
                                            <div class="kuota-bidang-pkm">Kuota : 35 tim</div>
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
                                            <div class="kuota-bidang-pkm">Kuota : 35 tim</div>
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
                                            <div class="kuota-bidang-pkm">Kuota : 35 tim</div>
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
                                            <div class="kuota-bidang-pkm">Kuota : 35 tim</div>
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
                                            <div class="kuota-bidang-pkm">Kuota : 25 tim</div>
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
                                            <div class="kuota-bidang-pkm">Kuota : 25 tim</div>
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
                                            <div class="kuota-bidang-pkm">Kuota : 15 tim</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                {!! $errors->first('bidang','<div>:message</div>') !!}
                <div class="divider-pendataan-pkm"></div>
                <div class="abstraksi-pkm">
                    <div class="judul-text">Abstraksi PKM</div>
                    <textarea class="textarea-abstraksi" name="abstraksi"
                        placeholder="Masukkan abstraksi PKM">{{ old('abstraksi') ?? $jawabanBidang }}</textarea>
                    {!! $errors->first('abstraksi','<div>:message</div>') !!}
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-submit-pkm">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection