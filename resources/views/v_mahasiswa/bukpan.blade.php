@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->
<div class="jumbotron jumbotron-fluid bg-bukpan">
    <div class="container">
        <h1 class="titleBukpan">Buku Panduan</h1>
        <div class="garisBukpan"></div>
        <div class="container Bukpan">
            <div class="d-flex justify-content-center">
                <div class="detail-tugas">
                    <p class="detail-title">Deskripsi</p>
                    <div class="d-flex flex-column detail-list mt-4">
                        <div class="d-flex flex-row mb-2">
                            <div class="text">Kamu pastinya sudah tahu istilah, bahwa buku adalah jendela dunia. Untuk itu, kali ini kamu diharuskan untuk mengetahui informasi seputar PK2MABA & Startup Academy 2019, serta Fakultas Ilmu Komputer Universitas Brawijaya dengan cara mengunduh dan mencetak buku panduan yang telah tersedia. Tapi tidak sebatas itu saja, ada syarat lain yang harus kamu lakukan untuk mendapatkan kupon ini, yakni dengan membaca dan memahami buku tersebut. </div>
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
                            <div class="text">Buku dicetak dengan ukuran A5 dan dijilid langsung/ terusan/ lem.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">3.</div>
                            <div class="text">Bagian sampul dicetak berwarna dengan kertas buffalo putih dan dilaminasi.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">4.</div>
                            <div class="text">Bagian isi dicetak berwarna dengan kertas HVS secara bolak-balik.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">5.</div>
                            <div class="text">Buku panduan wajib dibawa pada setiap rangkaian PK2MABA & Startup Academy.</div>
                        </div>
                    </div>
                    <p class="detail-title">Cara</p>
                    <div class="d-flex flex-column detail-list mt-4">
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">1.</div>
                            <div class="text">Unduh buku panduan PK2MABA & Startup Academy 2019 di <a href="#">link berikut ini.</a></div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">2.</div>
                            <div class="text">Kemudian, cetak dan jilid buku panduan tersebut sesuai dengan ketentuan yang telah diberikan.</div>
                        </div>
                        <div class="d-flex flex-row mb-2">
                            <div class="nomor-text">3.</div>
                            <div class="text">Pastikan untuk tidak lupa mengisikan identitas kamu pada halaman yang telah tersedia dalam buku panduan.</div>
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
