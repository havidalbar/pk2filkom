<nav class="navbar navbar-expand-md navbar-dark sticky-top sticky-dekstop">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}"><img
                src="{{asset('img/bg-section/simaba2@4x.svg')}}" class="imgCover"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
            <a href="{{route('index')}}" class="nav-item nav-link menu" >TENTANG SIMABA</a>
            <a href="{{route('index')}}" class="nav-item nav-link menu" >RANGKAIAN</a>
            <a href="{{route('faq')}}" class="nav-item nav-link menu">FAQ</a>
                <a href="#" class="nav-item nav-link menu" data-item-ojb="pk2-jb6">BERITA</a>
                @if (session('nim'))
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ session('nama') }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('mahasiswa.penugasan') }}">Penugasan</a>
                        <a class="dropdown-item" href="#">Penilaian</a>
                        <a class="dropdown-item" href="{{ route('mahasiswa.qr-code') }}">QR Code</a>
                        <a class="dropdown-item" href="{{ route('mahasiswa.nametag') }}">Name Tag</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item logout" href="{{ route('mahasiswa.logout') }}"><span><i class="fas fa-sign-out-alt"></i></span>
                            Logout</a>
                    </div>
                </div>
                @else
                <a href="{{ route('mahasiswa.login') }}" class="nav-item nav-link ">LOGIN</a>
                @endif
            </div>
        </div>
    </div>
</nav>
