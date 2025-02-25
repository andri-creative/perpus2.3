<nav class="navbar navbar-expand-lg spen-warna sticky-md-topsticky-md-top font-roboto">
    <div class="container col-md-12">
        <div class="col-md-6 d-flex justify-content-between align-items-center">
            <button class="btn p-0 border-0 bg-transparent shadow-none text-white d-lg-none" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5" d="M4 12h12M4 8h16M4 16h8" />
                </svg>
            </button>
            <div class="col-md-2">
                <a href="">
                    <img src="https://smpn1sedati.sch.id/wp-content/uploads/2018/08/cropped-favicon.png" alt=""
                        width="50" />
                </a>
            </div>
            <div class="col-md-10 d-flex align-content-center">
                <div class="fs-5 fw-bold text-white">PERPUSTAKAAN SMP 1 SEDATI</div>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <a href="#"
                class="d-none d-lg-flex justify-content-center align-items-center text-white rounded-circle border border-white ms-auto"
                style="width: 30px; height: 30px">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20">
                    <path fill="currentColor"
                        d="M14 10L8 5v3H1v4h7v3zm3 7H9v2h8c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2H9v2h8z" />
                </svg>
            </a>
        </div>
    </div>
</nav>
<!-- NAVBAR KEDUA (Tampil di Desktop, Hilang di Mobile) -->
<nav class="navbar navbar-expand-lg spen-warna sticky-md-topsticky-md-top sticky-md-top font-roboto fs-6 fw-bold">
    <div class="container">
        <div class="container-fluid">
            <div class="collapse navbar-collapse ">
                <ul class="navbar-nav me-auto mb-2 py-2 mb-lg-0">
                    <li class="nav-item ms-3">
                        <a class="nav-link text-white" href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="nav-link text-white" href="{{ route('koleksi') }}">Koleksi</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="nav-link text-white" href="{{ route('pen') }}">Pengunjung</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</nav>

<!-- NAVBAR KEDUA (Mode Mobile - Sidebar) -->
<div class="offcanvas offcanvas-start spen-warna text-white d-lg-none" tabindex="-1" id="offcanvasNavbar">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title fw-bold text-white">PERPUSTAKAAN SMP 1 SEDATI</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item border-bottom"><a class="nav-link" href="/{{ route('beranda') }}">Beranda</a></li>
            <li class="nav-item border-bottom"><a class="nav-link" href="{{ route('koleksi') }}">Koleksi</a></li>
            <li class="nav-item border-bottom">
                <a class="nav-link" href="{{ route('pen') }}">Pengunjung</a>
            </li>
            <li class="nav-item border-bottom"><a class="nav-link" href="#">Login</a></li>
        </ul>
    </div>
</div>
