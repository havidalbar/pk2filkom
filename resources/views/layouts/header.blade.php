<nav class="navbar navbar-expand-md navbar-dark sticky-top sticky-dekstop">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}"><img src="{{asset('img/bg-section/simaba2@4x.svg')}}"
                class="imgCover"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a href="{{ route('index') }}" class="nav-item nav-link menu">TENTANG SIMABA</a>
                <a href="{{ route('index') }}" class="nav-item nav-link menu">RANGKAIAN</a>
                <a href="{{ route('faq') }}" class="nav-item nav-link menu">FAQ</a>
                <a href="{{ route('index') }}" class="nav-item nav-link menu">BERITA</a>
                <a href="{{route('teman-simaba')}}" class="nav-item nav-link menu">TEMAN SIMABA</a>
                @if (session('nim'))
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        $nama = session('nama');
                        $splitNama = explode(' ', $nama);
                        if (count($splitNama) > 1) {
                            $nama = $splitNama[0] . ' ' . (isset($splitNama[1][0]) ? $splitNama[1][0] . '.' : '');
                        }
                        echo $nama;
                        ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('mahasiswa.penugasan.index') }}">Penugasan</a>
                        <a class="dropdown-item" href="{{ route('mahasiswa.penilaian') }}">Penilaian</a>
                        <a class="dropdown-item" href="{{ route('mahasiswa.qr-code') }}">QR Code</a>
                        <a class="dropdown-item" href="{{ route('mahasiswa.nametag') }}">Nametag</a>
                        <a class="dropdown-item" href="{{ route('mahasiswa.penugasan-kelompok-pkm.index') }}">PKM KELOMPOK</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item logout" href="{{ route('mahasiswa.logout') }}">
                            <span><i class="fas fa-sign-out-alt"></i></span>
                            Keluar
                        </a>
                    </div>
                </div>
                @else
                <a href="{{ route('mahasiswa.login', ['redirectTo' => Request::path()]) }}"
                    class="nav-item nav-link ">LOGIN</a>
                @endif
            </div>
        </div>
    </div>
</nav>
