@extends('dashboard.asset.main')
@section('title', 'Dashboard Page | Jenis Kelamin')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Klasifikasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Jenis Kelamin</li>
        </ol>
    </nav>
    <div class="row py-3 px-3">
        <div class="d-inline-flex p-2 justify-content-end gap-4">
            <a href="{{ route('dashboard-gender-create') }}" class="btn bg-primary border text-white shadow-lg">+ Tambah
                Jenis Kelamin</a>
        </div>
        <div class="col-12 p-0 py-4">
            <div class="card boder border-0 shadow-lg rounded-4">
                <div class="card-header bg-transparent card-body-custom pt-5 pb-3">
                    <h4 class="card-title border-0 px-2 py-2">
                        Data Jenis Kelamin
                    </h4>
                </div>
                <div class="card-body px-5">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-base-color text-center">No</th>
                                    <th scope="col" class="text-base-color text-center">Jenis Kelamin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($genders as $idx => $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $idx + 1 }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->gender }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="fst-italic text-center">
                                            Data gender belum tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
