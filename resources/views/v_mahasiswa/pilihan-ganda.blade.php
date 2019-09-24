@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->
@section('js')
<script type="text/javascript" src="{{ asset('js/script-pilgan.js') }}"></script>
@endsection

<div class="jumbotron jumbotron-fluid bg-pilgan">
    <div class="container container-pilgan">
        <div class="container-pilgan">
            <h1 class="titleKumpulVideo">Pilihan Ganda</h1>
            <div class="garisKumpulVideo"></div>
            <div class="row container-soal">
                <div class="col-md-8">
                    <div class="col-md-12 container-pertanyaan-navigasi">
                        <form class="pertanyaan" action="coba.php">
                            <div class="container-pertanyaan">
                                <div class="container-icon-soal">
                                    <button class="button-icon" onclick="gantiSoal(idSoal()-1)">
                                        <i class="fas fa-caret-left icon-soal"></i>
                                    </button>
                                </div>
                                <div class="container-text-soal">
                                    <div class="nomor-soal">SOAL 23</div>
                                    <div class="text-soal">
                                        Yang menjabat sebagai wakil dekan II Fakultas Ilmu Komputer adalah Bapak?
                                    </div>
                                    <div class="container-pilihan">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="jawaban" value="a"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio1">Toggle this custom
                                                radio</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio3" name="jawaban" value="c"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio3">Or toggle this other
                                                custom radio</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio4" name="jawaban" value="d"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio4">Or toggle this other
                                                custom radio</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio5" name="jawaban" value="e"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio5">Or toggle this other
                                                custom radio</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-icon-soal">
                                    <button class="button-icon" onclick="gantiSoal(idSoal()+1)">
                                        <i class="fas fa-caret-right icon-soal"></i>
                                    </button>
                                </div>
                            </div>
                    </div>                    
                </div>
                <div class="col-md-4">
                    <div
                        class="col-md-12 container-pertanyaan-navigasi d-flex flex-column justify-content-center align-items-center">
                        <div class="row d-flex justify-content-center align-items-center">
                            @for ($i = 1; $i <= 25; $i++) 
                            <button class="navigasi">
                                <div class="nomor-navigasi">{{$i}}</div>
                                <div class="status-navigasi"></div>
                            </button>
                            @endfor                        
                        </div>                        
                        <!-- Button trigger modal -->
                        <button type="button" id="selesai-pilgan" class="btn-selesai-pilgan" data-toggle="modal" data-target="#modalPilgan">
                        Selesai
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modalPilgan" role="dialog" aria-labelledby="modalPilganTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalPilganTitle">Konfirmasi Selesai</h5>
                                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apa anda yakin sudah selesai menjawab semua soal?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Kumpulkan</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <div class="fixed-timer d-flex flex-column align-items-center">
                        <div class="container-timer">
                            <div class="sisa-waktu">Sisa Waktu</div>
                            <div class="garis-sisa-waktu"></div>
                            <div class="d-flex flex-row">
                                <div class="col-timer">
                                    <div class="jam"></div>
                                    <div>Jam</div>
                                </div>
                                <div class="col-timer">
                                    <div class="menit"></div>
                                    <div>Menit</div>
                                </div>
                                <div class="col-timer">
                                    <div class="detik"></div>
                                    <div>Detik</div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>

<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection