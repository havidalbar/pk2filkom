@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->
<div class="jumbotron jumbotron-fluid bg-kumpul-video-ig">
    <div class="container">
        <h1 class="titleKumpulVideo">{{ $penugasan->judul }}</h1>
        <div class="garisKumpulVideo"></div>
        <div class="container bg-kumpul">
            <div class="d-flex align-items-center justify-content-center">
                <div class="preview-tugas">
                    @foreach ($penugasan->soal as $index => $soal)
                    <p class="preview-text">Preview</p>
                    @if ($penugasan->jenis == 1)
                    <div class="justify-content-center align-content-center d-flex">
                        <iframe id="preview-video-ig-{{ $index }}" class="preview-video-ig"
                            src="https://www.instagram.com/p/BsDMEbyF_qf/embed" frameborder="0" scrolling="no"
                            allowtransparency="true">
                        </iframe>
                    </div>
                    @elseif ($penugasan->jenis == 2)
                    <div
                        class="justify-content-center align-content-center d-flex embed-responsive embed-responsive-16by9">
                        <iframe id="preview-video-yt-{{$index}}" src="https://www.youtube.com/embed/1smZUQs0gIE"
                            frameborder="0" scrolling="no" allowtransparency="true">
                        </iframe>
                    </div>
                    @endif
                    <script>
                        $(document).ready(function () {
                        $('#input-video-ig-{{ $index }}').on('input', function() {
                            document.getElementById("preview-video-ig-{{$index}}").src = (this.value) + "embed";
                        });
                        $('#input-video-yt-{{ $index }}').on('input', function() {
                            var link = this.value;
                            var splitLink = link.split("/");
                            var idLink = splitLink[3];
                            document.getElementById("preview-video-yt-{{$index}}").src = "https://www.youtube.com/embed/" + idLink;
                        });
                    });
                    </script>
                    @endforeach
                    <div class="d-flex justify-content-center">
                        <form class="form-input-link" method="POST">
                            @csrf
                            <div class="input-group">
                                @foreach ($penugasan->soal as $index => $soal)
                                <?php
                                $jawabanSoal = null;

                                foreach ($jawabans as $jawaban) {
                                    if ($jawaban->id_soal == $soal->id) {
                                        $jawabanSoal = $jawaban;
                                        break;
                                    }
                                }
                                ?>
                                @if ($penugasan->jenis == '1')
                                <input id="input-video-ig-{{ $index }}" type="url" class="form-control input-video"
                                    placeholder="{{ $soal->soal }}" name="jawaban[{{ $index }}][url]"
                                    value="{{ $jawabanSoal ? $jawabanSoal->jawaban : '' }}">
                                @elseif ($penugasan->jenis == '2')
                                <input id="input-video-yt-{{ $index }}" type="url" class="form-control input-video"
                                    placeholder="{{ $soal->soal }}" name="jawaban[{{ $index }}][url]"
                                    value="{{ $jawabanSoal ? $jawabanSoal->jawaban : '' }}">
                                @endif
                                <input name="jawaban[{{ $index }}][id]" value="{{ $soal->id }}" type="hidden">
                                @endforeach
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-submit-web">submit</button>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-submit-mobile">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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