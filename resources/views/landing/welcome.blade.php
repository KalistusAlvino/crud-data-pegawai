@extends('landing.asset.main')
@section('title', 'Welcome Page')
@section('content')
    <main class="container-fuild"
        style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('storage/landing/pns.jpg') }}') center/cover no-repeat fixed;">
        <!-- Navbar -->
        <nav class="navbar navbar-dark bg-transparent fixed-top">
            <div class="container">
                <a class="navbar-brand fs-3 fw-bold" href="#">PNS</a>
                <a class="btn btn-outline-light px-4 py-2 fw-semibold rounded-pill shadow-sm" href="{{ route('login') }}">
                    <i class="fa-solid fa-arrow-right-from-bracket me-1"></i> Login
                </a>
            </div>
        </nav>
        <!-- Section -->
        <section class="position-relative vh-100 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <p class="text-white text-uppercase mb-3 ls-1 fs-2">Selamat Datang</p>
                        <h1 class="display-3 fw-bold mb-4 lh-1 text-white" style="text-align: justify">
                            Kelola Data Pegawai Negeri Sipil Dengan Mudah dan Efisien
                        </h1>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
