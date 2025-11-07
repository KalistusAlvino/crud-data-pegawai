@extends('dashboard.asset.main')
@section('title', 'Dashboard Page | Tambah Agama')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Klasifikasi</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard-agama-index') }}">Agama</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Agama</li>
        </ol>
    </nav>
    <div class="col-12 p-0 py-4">
        <div class="card boder border-0 shadow-lg rounded-4">
            <div class="card-header bg-transparent card-body-custom pt-5 pb-3">
                <h4 class="card-title border-0 px-2 py-2">
                    Tambah Agama
                </h4>
            </div>
            <div class="card-body px-5">
                <form action="{{ route('dashboard-agama-store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="inputAgama" class="form-label">Agama <span class="text-danger">*</span></label>
                        <input list="daftarAgama" type="text" class="form-control" id="inputAgama" name="agama"
                            required>
                        <datalist id="daftarAgama">
                            <option value="Islam">
                            <option value="Protestan">
                            <option value="Katolik">
                            <option value="Hindu">
                            <option value="Buddha">
                            <option value="Konghucu">
                        </datalist>
                        <div class="form-text">
                            Hanya agama berikut yang diperbolehkan: Islam, Protestan, Katolik, Hindu, Buddha,
                            Konghucu.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
