@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->
<div class="jumbotron jumbotron-fluid bg-kumpul-line">
    <div class="container">
        <h1 class="titleKumpulLine">{{ $penugasan->judul }}</h1>
        <div class="garisKumpulLine"></div>
        <div class="container bg-kumpul">
            <div class="d-flex align-items-center justify-content-center">
                <div class="preview-tugas">
                    <p class="pengumpulan-text">Pengumpulan Tugas</p>
                    <div class="d-flex justify-content-center">
                        <form class="form-input-link" method="POST">
                            {{ csrf_field() }}
                            @foreach ($penugasan->soal as $index => $soal)
                            <div class="form-group">
                                <?php
                                $jawabanSoal = '';

                                foreach ($jawabans as $jawaban) {
                                    if ($jawaban->id_soal == $soal->id) {
                                        $jawabanSoal = $jawaban->jawaban;
                                        break;
                                    }
                                }
                                ?>
                                <input type="hidden" name="jawaban[{{ $index }}][id]" value="{{ $soal->id }}">
                                <label>{{ $soal->soal }}</label>
                                <input id="input-line-{{ $index }}" type="url"
                                    class="form-control {{ $errors->has('jawaban.' . $index . '.*') ? 'form-control-danger' : '' }}"
                                    placeholder="{{ $soal->soal }}" name="jawaban[{{ $index }}][url]" required
                                    value="{{ old('jawaban.'. $index . '.url') ?? $jawabanSoal }}">
                                @foreach ($errors->get('jawaban.' . $index . '.*') as $message)
                                <div class="form-control-feedback">
                                    {{ $message[0] }}
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-submit-line">submit tugas</button>
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