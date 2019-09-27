@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->
@section('js')
<script type="text/javascript" src="{{ asset('js/script-pilgan.js') }}"></script>
<script>
    var token = `{{$jwt}}`;
    var origin = window.location.origin;
    var penugasan = `{{$penugasan->slug}}`;
    var jumlahSoal = `{{count($penugasan->soal)}}`;
    var dataSoal;
    var dataUrl;
</script>
<script>
    window.onload = function(e) {
        var diffTime = {{ $sisaWaktu }} % (24 * 60 * 60);        
        var duration = moment.duration(diffTime * 1000, 'milliseconds');
        var interval = 1000;
        if (diffTime > 0) {
            var intervalFunc = setInterval(function() {
                if (duration > 0) {
                    duration = moment.duration(duration.asMilliseconds() - interval, 'milliseconds');
                    let h = Math.floor(duration / (60 * 60 * 1000));
                    let m = Math.floor(duration / 60000 % 60);
                    let s = Math.floor(duration % 60000) / 1000;

                    h = $.trim(h).length === 1 ? '0' + h : h;
                    m = $.trim(m).length === 1 ? '0' + m : m;
                    s = $.trim(s).length === 1 ? '0' + s : s;
                                                
                    $(".jam").text(h);
                    $(".menit").text(m);
                    $(".detik").text(s);
                } 
                else {
                    submitForm();
                    clearInterval(intervalFunc);
                }
            }, interval);
        }
    };
    function submitForm() {
        console.log("submit form");
        submitPilihanJawaban();
        $("#form-jawaban-pilgan").submit();
    }
</script>
@endsection

<div class="jumbotron jumbotron-fluid bg-pilgan">
    <div class="container container-pilgan">
        <div class="container-pilgan">
            <h1 class="titleKumpulVideo">Pilihan Ganda</h1>
            <div class="garisKumpulVideo"></div>
            <div class="row container-soal">
                <div class="col-md-8">
                    <div class="col-md-12 container-pertanyaan-navigasi">
                        <form id="form-jawaban-pilgan" class="pertanyaan" method="post">
                        {{ csrf_field() }}
                            <div class="container-pertanyaan">
                                <div id="prevSoal" class="container-icon-soal" hidden>
                                    <button type="button" class="button-icon" onclick="gantiSoal(idSoal()-1)">
                                        <i class="fas fa-caret-left icon-soal"></i>
                                    </button>
                                </div>
                                <div class="container-text-soal">
                                    <div class="nomor-soal">
                                        <div class="text-nomor-soal"></div>
                                        <div class="angka-nomor-soal"></div>
                                    </div>
                                    <div class="text-soal"></div>
                                    <div class="container-pilihan"></div>
                                </div>
                                <div id="nextSoal" class="container-icon-soal">
                                    <button type="button" class="button-icon" onclick="gantiSoal(idSoal()+1)">
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
                            @for ($i = 1; $i <= count($penugasan->soal); $i++) 
                                <button type="button" class="navigasi" onclick="gantiSoal(`{{$i}}`)">
                                <div class="nomor-navigasi no-{{$i}}">{{$i}}</div>
                                <div class="status-navigasi no-{{$i}}"></div>
                                </button>
                            @endfor
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" onclick="submitPilihanJawaban()" id="selesai-pilgan" class="btn-selesai-pilgan" data-toggle="modal"
                            data-target="#modalPilgan">
                            Selesai
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modalPilgan" role="dialog" aria-labelledby="modalPilganTitle"
                            aria-hidden="true" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPilganTitle">Konfirmasi Selesai</h5>
                                        <button type="button" class="close close-modal" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apa anda yakin sudah selesai menjawab semua soal?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger close-modal"
                                            data-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-success" onclick="submitForm()">Kumpulkan</button>
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
    <div class="d-flex flex-column align-items-center">
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