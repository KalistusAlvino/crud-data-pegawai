@extends('dashboard.asset.main')
@section('title', 'Dashboard Page | Tambah Eselon')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Klasifikasi</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard-eselon-index') }}">Eselon</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Eselon</li>
        </ol>
    </nav>
    <div class="col-12 p-0 py-4">
        <div class="card boder border-0 shadow-lg rounded-4">
            <div class="card-header bg-transparent card-body-custom pt-5 pb-3">
                <h4 class="card-title border-0 px-2 py-2">
                    Tambah Eselon
                </h4>
            </div>
            <div class="card-body px-5">
                <form action="{{ route('dashboard-eselon-store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="inputEselon" class="form-label">Eselon <span class="text-danger">*</span></label>
                        <input list="daftarEselon" type="text" class="form-control" id="inputEselon" name="kode_eselon"
                            required>
                        <div class="form-text">
                           Contoh: I, II, III, IV, V
                        </div>
                        <datalist id="daftarEselon">
                            <option value="I">
                            <option value="II">
                            <option value="III">
                            <option value="IV">
                            <option value="V">
                        </datalist>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
