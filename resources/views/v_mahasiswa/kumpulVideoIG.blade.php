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
            <form class="form-input-link" method="POST">
                {{ csrf_field() }}
                @foreach ($penugasan->soal as $index => $soal)
                <div class="d-flex align-items-center justify-content-center">
                    <div class="preview-tugas">
                        <p class="preview-text">Preview</p>
                        @if ($penugasan->jenis == 1)
                        <div class="justify-content-center align-content-center d-flex">
                            <iframe id="preview-video-ig-{{ $index }}" class="preview-video-ig"
                                src="https://www.instagram.com/p/BwRlQ2Gldsm/embed" frameborder="0" scrolling="no"
                                allowtransparency="true">
                            </iframe>
                        </div>
                        @elseif ($penugasan->jenis == 2)
                        <div
                            class="justify-content-center align-content-center d-flex embed-responsive embed-responsive-16by9">
                            <iframe id="preview-video-yt-{{$index}}" src="https://www.youtube.com/embed/c04R9immWMc"
                                frameborder="0" scrolling="no" allowtransparency="true">
                            </iframe>
                        </div>
                        @endif
                        <script>
                            $(document).ready(function () {
                        $('#input-video-ig-{{ $index }}').on('input', function() {                            
                            var linkIG = this.value;
                            var splitLinkIG = linkIG.split("/");
                            var idLinkIG = splitLinkIG[4];
                            document.getElementById("preview-video-ig-{{$index}}").src = "https://www.instagram.com/p/" + idLinkIG + "/embed";
                        });
                        $('#input-video-yt-{{ $index }}').on('input', function() {
                            var link = this.value;
                            var splitLink = link.split("/");
                            var idLink = splitLink[3];
                            document.getElementById("preview-video-yt-{{$index}}").src = "https://www.youtube.com/embed/" + idLink;
                        });
                    });
                        </script>
                        <div style="margin-top: 24px"></div>
                        @foreach ($errors->get('jawaban[' . $index . ']*') as $message)
                        <p style="color: red">
                            {{ $message[0] }}
                        </p>
                        @endforeach
                        <div class="d-flex justify-content-center">
                            <div class="input-group">
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
                            </div>
                            <input name="jawaban[{{ $index }}][id]" value="{{ $soal->id }}" type="hidden">
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="d-flex align-items-center justify-content-center" style="margin-top: 24px">
                    <button type="submit" class="btn btn-submit">submit</button>
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