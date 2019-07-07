@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->
<div class="jumbotron jumbotron-fluid bg-kumpul-video-ig">
    <div class="container">
        <h1 class="titleKumpulVideo">Cerita Tentang Aku</h1>
        <div class="garisKumpulVideo"></div>
        <div class="container bg-kumpul">
            <div class="row">
                <div class="col-md-7 col-video">
                    <div>
                        <p class="preview-text">Preview</p>
                        <div class="justify-content-center align-content-center d-flex">
                            <iframe id="preview-video-ig" src="https://www.instagram.com/p/BqcccCmFrcP/embed"
                                frameborder="0" scrolling="no" allowtransparency="true">
                            </iframe>
                        </div>
                        <div>
                            <form class="form-input-link" method="GET">
                                <div class="input-group">
                                    <input id="input-video-ig" type="url" class="form-control"
                                        placeholder="ex: https://www.instagram.com/p/BsDMEbyF_qf/" name="linkVideo">
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
                <div class="col-md-5 col-ketentuan">
                    <p class="ketentuan-title">Ketentuan Tugas</p>
                    <div class="d-flex flex-column list-ketentuan mt-4">
                        <div class="d-flex flex-row mb-2">
                            <div>1.</div>
                            <div class="ketentuan-text">Periode: 29 Juli - 10 Agustus 2019</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div>2.</div>
                            <div class="ketentuan-text">Dalam video ‘Cerita Tentang Aku’ harus memperlihatkan bagian wajah secara jelas</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div>3.</div>
                            <div class="ketentuan-text">Konten video meliputi:</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div >-</div>
                            <div class="ketentuan-text">Perkenalan diri</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div >-</div>
                            <div class="ketentuan-text">Alasan memilih FILKOM</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div >-</div>
                            <div class="ketentuan-text">Pengetahuan tentang FILKOM</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div >-</div>
                            <div class="ketentuan-text">Ambisi di FILKOM serta cara pencapaiannya</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div >-</div>
                            <div class="ketentuan-text">Harapan untuk FILKOM</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div>4.</div>
                            <div class="ketentuan-text">Dalam video ‘Cerita Tentang Aku’ harus memperlihatkan bagian wajah secara jelas</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div>5.</div>
                            <div class="ketentuan-text">Dalam video ‘Cerita Tentang Aku’ harus memperlihatkan bagian wajah secara jelas</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div>6.</div>
                            <div class="ketentuan-text">Dalam video ‘Cerita Tentang Aku’ harus memperlihatkan bagian wajah secara jelas</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div>7.</div>
                            <div class="ketentuan-text">Dalam video ‘Cerita Tentang Aku’ harus memperlihatkan bagian wajah secara jelas</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div>8.</div>
                            <div class="ketentuan-text">Dalam video ‘Cerita Tentang Aku’ harus memperlihatkan bagian wajah secara jelas</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div>9.</div>
                            <div class="ketentuan-text">Dalam video ‘Cerita Tentang Aku’ harus memperlihatkan bagian wajah secara jelas</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection