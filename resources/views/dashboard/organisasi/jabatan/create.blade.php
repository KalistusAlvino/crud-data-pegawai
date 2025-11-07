@extends('dashboard.asset.main')
@section('title', 'Dashboard Page | Tambah Jabatan')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Klasifikasi</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard-jabatan-index') }}">Jabatan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Jabatan</li>
        </ol>
    </nav>
    <div class="col-12 p-0 py-4">
        <div class="card boder border-0 shadow-lg rounded-4">
            <div class="card-header bg-transparent card-body-custom pt-5 pb-3">
                <h4 class="card-title border-0 px-2 py-2">
                    Tambah Jabatan
                </h4>
            </div>
            <div class="card-body px-5">
                <form action="{{ route('dashboard-jabatan-store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="inputJabatan" class="form-label">Jabatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="inputJabatan" name="nama_jabatan"
                            required>
                        <div class="form-text">
                           Contoh: Kepala Sekretariat Utama, Penyusun laporan keuangan
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
