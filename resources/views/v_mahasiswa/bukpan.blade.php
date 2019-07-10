@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
@include('layouts.header')
<div class="jumbotron jumbotron-fluid bg-bukpan">
    <div class="container bukpan">
        <div class="card d-flex">
            <div class="card title">
                KETENTUAN CETAK BUKU PANDUAN
            </div>
            <div class="ketentuan">
                <p>1. Periode: 29 Juli - 13 Agustus 2019</p>
                <p>2. Buku dicetak dengan ukuran A5 dan dijilid langsung/ terusan/ lem</p>
                <p>3. Bagian sampul dicetak berwarna dengan kertas buffalo putih dan dilaminasi</p>
                <p>4. Bagian isi dicetak berwarna dengan kertas HVS secara bolak-balik</p>
                <p>5. Buku panduan wajib dibawa pada setiap rangkaian PK2MABA & Startup Academy</p>
            </div>
            <div class="card title download">
                DOWNLOAD BUKU PANDUAN
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection