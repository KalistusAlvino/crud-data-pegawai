@extends('dashboard.asset.main')
@section('title', 'Dashboard Page | Tambah Golongan')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Klasifikasi</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard-golongan-index') }}">Golongan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Golongan</li>
        </ol>
    </nav>
    <div class="col-12 p-0 py-4">
        <div class="card boder border-0 shadow-lg rounded-4">
            <div class="card-header bg-transparent card-body-custom pt-5 pb-3">
                <h4 class="card-title border-0 px-2 py-2">
                    Tambah Golongan
                </h4>
            </div>
            <div class="card-body px-5">
                <form action="{{ route('dashboard-golongan-store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="inputGolongan" class="form-label">Golongan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="inputGolongan" name="kode_golongan"
                            required>
                        <div class="form-text">
                           Contoh: IV/e, IV/a, III/c, III/b, III/a, IV/c
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
