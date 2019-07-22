@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->
<div class="jumbotron jumbotron-fluid bg-kumpulTwibbon">
    <div class="container">
        <h1 class="titleTwibbon">Twibbon</h1>
        <div class="garisTwibbon"></div>
        <div class="container Twibbon">
            <div class="d-flex align-items-center justify-content-center">
                <div class="preview-twibbon">
                    <p class="preview-text">Preview</p>
                    <!-- IG -->
                    <div class="justify-content-center align-content-center d-flex">
                        <iframe id="preview-twibbon" src="https://www.instagram.com/p/BsDMEbyF_qf/embed" frameborder="0" scrolling="no" allowtransparency="true">
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
                                <input id="input-twibbon" type="url" class="form-control input-twibbon" placeholder="ex: https://www.instagram.com/p/BsDMEbyF_qf/" name="linkIG">
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
                    <p class="detail-title">Deskripsi</p>
                    <div class="d-flex flex-column detail-list mt-4">
                        <div class="d-flex flex-row mb-2">
                            <div class="text">Akhirnya kamu telah dinyatakan sebagai keluarga besar Fakultas Ilmu Komputer Universitas Brawijaya, pastinya kamu sangat bangga kan? Nah untuk lebih meningkatkan rasa bangga dan semangat kamu dalam mengikuti kegiatan PK2MABA & STARTUP ACADEMY 2019 ini, kamu akan diberikan kesempatan untuk mendapatkan kupon berhadiah. Untuk mendapatkannya, kamu harus memasang twibbon dengan foto terkeren dan terunik kamu. Ayo ramaikan!</div>
                        </div>
                    </div>
                    <p class="detail-title">Ketentuan Tugas</p>
                    <div class="d-flex flex-column detail-list mt-4">
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text text-periode">1.</div>
                            <div class="text text-periode">Periode: 29 Juli - 13 Agustus 2019.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">2.</div>
                            <div class="text">Foto yang digunakan harus memperlihatkan bagian wajah dan tidak diperbolehkan untuk menggunakan foto binatang, orang lain, karakter, maupun yang lainnya.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">3.</div>
                            <div class="text">Media sosial yang digunakan untuk mengunggah foto twibbon tidak dalam mode privat.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">4.</div>
                            <div class="text">Twibbon yang telah diunggah tidak diperbolehkan untuk dihapus atau diarsipkan hingga akhir rangkaian PK2MABA & Startup Academy 2019.</div>
                        </div>
                    </div>
                    <p class="detail-title">Cara</p>
                    <div class="d-flex flex-column detail-list mt-4">
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">1.</div>
                            <div class="text">Abadikan foto terbaikmu atau kamu juga dapat memilih foto yang telah kamu miliki.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">2.</div>
                            <div class="text">Setelah mengabadikan atau memilih foto, kamu diwajibkan untuk memasang foto kamu pada twibbon yang telah disediakan. Twibbon tersebut dapat kamu unduh pada website SiMABA atau melalui <a target="_blank" href="https://s.id/twibbon-pk2-2019">link berikut ini.</a></div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">3.</div>
                            <div class="text">Kamu wajib memberikan caption pada foto tersebut sesuai dengan konten yang telah disediakan. Konten caption tersebut, bisa kamu lihat pada <a target="_blank" href="https://s.id/twibbon-pk2-2019">link berikut ini.</a> Dan jangan lupa untuk menyertakan tagar #FILKOMUB2019 #BersamaUntukBersatu #SatuHatiSatuJiwaFILKOM pada bagian akhir dari caption tersebut. </div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">4.</div>
                            <div class="text">Unggah foto tersebut melalui Instagram yang kamu miliki dengan men-tag akun resmi PK2MABA FILKOM UB 2019 yakni @pk2maba_filkom. Pastikan kamu telah mengikuti akun Instagram PK2MABA FILKOM UB 2019 terlebih dahulu ya!</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">5.</div>
                            <div class="text">Dan terakhir, kamu diwajibkan untuk mengumpulkan link unggahan tersebut website ini sebagai bukti bahwa kamu telah berhasil mendapatkan kupon ini dan bisa mengikuti kegiatan PK2MABA & Startup Academy 2019.</div>
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
