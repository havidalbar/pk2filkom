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
            <div class="d-flex align-items-center justify-content-center">
                <div class="preview-tugas">
                    <p class="preview-text">Preview</p>
                    <div class="justify-content-center align-content-center d-flex">
                        <iframe id="preview-video-ig" src="https://www.instagram.com/p/BqcccCmFrcP/embed"
                            frameborder="0" scrolling="no" allowtransparency="true">
                        </iframe>
                    </div>
                    <div class="d-flex justify-content-center">
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
            <div class="d-flex justify-content-center">
                <div class="detail-tugas">
                    <p class="ketentuan-title">Ketentuan Tugas</p>
                    <div class="d-flex flex-column list-ketentuan mt-4">
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">1.</div>
                            <div class="ketentuan-text">Periode: 29 Juli - 10 Agustus 2019.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">2.</div>
                            <div class="ketentuan-text">Dalam video ‘Cerita Tentang Aku’ harus memperlihatkan bagian
                                wajah
                                secara jelas.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">3.</div>
                            <div class="ketentuan-text">
                                <div>Konten video meliputi:</div>
                                <div><span class="nomor-sub-text">-</span>Perkenalan diri</div>
                                <div><span class="nomor-sub-text">-</span>Alasan memilih FILKOM</div>
                                <div><span class="nomor-sub-text">-</span>Pengetahuan tentang FILKOM</div>
                                <div><span class="nomor-sub-text">-</span>Ambisi di FILKOM serta cara pencapaiannya</div>
                                <div><span class="nomor-sub-text">-</span>Harapan untuk FILKOM</div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">4.</div>
                            <div class="ketentuan-text">Tidak boleh mengandung kata-kata kotor dan SARA.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">5.</div>
                            <div class="ketentuan-text">Durasi video yang dibuat antara 3 - 5 menit.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">6.</div>
                            <div class="ketentuan-text">Audio/suara dari video harus dapat terdengar dengan jelas.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">7.</div>
                            <div class="ketentuan-text">Diperbolehkan untuk melakukan editing terhadap video yang
                                diambil.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">8.</div>
                            <div class="ketentuan-text">Media sosial yang digunakan untuk mengunggah video tidak dalam
                                mode privat.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">9.</div>
                            <div class="ketentuan-text">Video yang telah diunggah tidak diperbolehkan untuk dihapus atau
                                diarsipkan hingga akhir rangkaian PK2MABA & Startup Academy 2019.</div>
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