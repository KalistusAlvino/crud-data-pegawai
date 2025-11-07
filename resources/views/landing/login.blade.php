@extends('landing.asset.main')
@section('title', 'Login Page')
@section('content')
    <section class="vh-100" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('storage/landing/pns.jpg') }}') center/cover no-repeat fixed;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block"
                                style="background: url('{{ asset('storage/landing/pns.jpg') }}') center/cover no-repeat; border-radius: 1rem 0 0 1rem;">
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form action="{{ route('post-login') }}" method="POST">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fa-solid fa-people-group fa-2x me-3 text-primary"></i>
                                            <span class="h1 fw-bold mb-0">PNS</span>
                                        </div>

                                        <h5 class="fw-normal mb-4" style="letter-spacing: 1px;">Sign into your account
                                        </h5>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" id="formUsername"
                                                class="form-control" name="username" placeholder="Username" required/>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" id="formPassword"
                                                class="form-control" name="password"  placeholder="Password" required/>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center" type="submit">
                                                <i class="fa-solid fa-arrow-right-from-bracket me-2"></i> Login
                                            </button>
                                        </div>
                                        <a class="small text-muted d-flex justify-content-center link-underline link-underline-opacity-0" href="{{ route('landing') }}">
                                            Back to home</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
