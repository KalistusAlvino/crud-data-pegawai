@extends('dashboard.asset.main')
@section('title', 'Dashboard Page | Tambah Unit')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Klasifikasi</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard-unit-index') }}">Unit</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Unit</li>
        </ol>
    </nav>
    <div class="col-12 p-0 py-4">
        <div class="card boder border-0 shadow-lg rounded-4">
            <div class="card-header bg-transparent card-body-custom pt-5 pb-3">
                <h4 class="card-title border-0 px-2 py-2">
                    Tambah Unit
                </h4>
            </div>
            <div class="card-body px-5">
                <form action="{{ route('dashboard-unit-store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="inputUnit" class="form-label">Unit Kerja <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="inputUnit" name="nama_unit"
                            required>
                        <div class="form-text">
                           Contoh: Badan Nasional Penanggulangan Bencana (BNPB)
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
