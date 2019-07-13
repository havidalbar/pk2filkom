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
                    <!-- IG -->
                    <div class="justify-content-center align-content-center d-flex">
                        <iframe id="preview-video-ig" src="https://www.instagram.com/p/BsDMEbyF_qf/embed"
                            frameborder="0" scrolling="no" allowtransparency="true">
                        </iframe>
                    </div>
                    <!-- YT -->
                    <!-- <div class="justify-content-center align-content-center d-flex embed-responsive embed-responsive-16by9">                        
                        <iframe id="preview-video-yt" src="https://www.youtube.com/embed/1smZUQs0gIE"
                            frameborder="0" scrolling="no" allowtransparency="true">
                        </iframe>                        
                    </div> -->
                    <div class="d-flex justify-content-center">
                        <form class="form-input-link" method="GET">
                            <div class="input-group">
                                <!-- IG -->
                                <input id="input-video-ig" type="url" class="form-control input-video"
                                    placeholder="ex: https://www.instagram.com/p/BsDMEbyF_qf/" name="linkIG">
                                <!-- YT -->
                                <!-- <input id="input-video-yt" type="url" class="form-control input-video"
                                    placeholder="ex: https://youtu.be/1smZUQs0gIE" name="linkYT"> -->
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
                    <p class="detail-title">Ketentuan Tugas</p>
                    <div class="d-flex flex-column detail-list mt-4">
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text text-periode">1.</div>
                            <div class="text text-periode">Periode: 29 Juli - 10 Agustus 2019.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">2.</div>
                            <div class="text">Dalam video ‘Cerita Tentang Aku’ harus memperlihatkan bagian
                                wajah
                                secara jelas.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">3.</div>
                            <div class="text">
                                <div>Konten video meliputi:</div>
                                <div><span class="nomor-sub-text">-</span>Perkenalan diri</div>
                                <div><span class="nomor-sub-text">-</span>Alasan memilih FILKOM</div>
                                <div><span class="nomor-sub-text">-</span>Pengetahuan tentang FILKOM</div>
                                <div><span class="nomor-sub-text">-</span>Ambisi di FILKOM serta cara pencapaiannya
                                </div>
                                <div><span class="nomor-sub-text">-</span>Harapan untuk FILKOM</div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">4.</div>
                            <div class="text">Tidak boleh mengandung kata-kata kotor dan SARA.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">5.</div>
                            <div class="text">Durasi video yang dibuat antara 3 - 5 menit.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">6.</div>
                            <div class="text">Audio/suara dari video harus dapat terdengar dengan jelas.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">7.</div>
                            <div class="text">Diperbolehkan untuk melakukan editing terhadap video yang
                                diambil.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">8.</div>
                            <div class="text">Media sosial yang digunakan untuk mengunggah video tidak dalam
                                mode privat.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">9.</div>
                            <div class="text">Video yang telah diunggah tidak diperbolehkan untuk dihapus atau
                                diarsipkan hingga akhir rangkaian PK2MABA & Startup Academy 2019.</div>
                        </div>
                    </div>
                    <p class="detail-title">Cara</p>
                    <div class="d-flex flex-column detail-list mt-4">
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">1.</div>
                            <div class="text">Pertama, kamu dapat mulai untuk berpikir apa saja yang sekiranya akan kamu sampaikan pada video ‘Cerita Tentang Aku’. Untuk lebih jelasnya, kamu dapat kamu melihat contohnya di link berikut ini.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">2.</div>
                            <div class="text">Siapkan kamera dan ambil video terbaikmu. Kamu juga dapat mengedit video yang telah kamu ambil.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">3.</div>
                            <div class="text">Unggah video tersebut melalui akun Instagram yang kamu miliki dengan men-tag akun resmi PK2MABA FILKOM UB 2019 yakni @pk2maba_filkom. Kamu bisa membagi video tersebut ke dalam beberapa slide ya.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">4.</div>
                            <div class="text">Pastikan kamu memberikan caption sesuai dengan konten yang telah disediakan dan menambahkan kata-kata motivasi di dalamnya. Konten dari caption bisa kamu lihat pada <a href="#">link berikut ini.</a></div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">5.</div>
                            <div class="text">Dan jangan lupa untuk menyertakan tagar #KenaliAku #MariBerkawan #FILKOMUB2019 #BersamaUntukBersatu #SatuHatiSatuJiwaFILKOM pada bagian akhir dari caption tersebut.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">6.</div>
                            <div class="text">Selanjutnya, kamu dapat menyalin link unggahan tersebut dan mengumpulkannya di website SiMABA.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">7.</div>
                            <div class="text">Kamu juga dapat memberikan review mengenai video 'Cerita Tentang Aku' versi teman kamu dengan memberikan komentar pada unggahan videonya.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">8.</div>
                            <div class="text">Terakhir, selamat kamu telah sukses mendapatkan kupon ketiga!</div>
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