@extends('dashboard.asset.main')
@section('title', 'Dashboard Page | Tambah Gender')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Klasifikasi</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard-gender-index') }}">Gender</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Gender</li>
        </ol>
    </nav>
    <div class="col-12 p-0 py-4">
        <div class="card boder border-0 shadow-lg rounded-4">
            <div class="card-header bg-transparent card-body-custom pt-5 pb-3">
                <h4 class="card-title border-0 px-2 py-2">
                    Tambah Gender
                </h4>
            </div>
            <div class="card-body px-5">
                <form action="{{ route('dashboard-gender-store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="inputGender" class="form-label">Gender <span class="text-danger">*</span></label>
                        <input list="daftarGender" type="text" class="form-control" id="inputGender" name="gender"
                            required>
                        <datalist id="daftarGender">
                            <option value="L">
                            <option value="P">
                        </datalist>
                        <div class="form-text">
                           Valid data: L/P
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
