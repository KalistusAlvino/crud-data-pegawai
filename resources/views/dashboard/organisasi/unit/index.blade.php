@extends('dashboard.asset.main')
@section('title', 'Dashboard Page | Unit')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Organisasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Unit kerja</li>
        </ol>
    </nav>
    <div class="row py-3 px-3">
        <div class="d-inline-flex p-2 justify-content-end gap-4">
            <a href="{{ route('dashboard-unit-create') }}" class="btn bg-primary border text-white shadow-lg">+ Tambah Unit
                kerja</a>
        </div>
        <div class="col-12 p-0 py-4">
            <div class="card boder border-0 shadow-lg rounded-4">
                <div class="card-header bg-transparent card-body-custom pt-5 pb-3">
                    <h4 class="card-title border-0 px-2 py-2">
                        Data Unit kerja
                    </h4>
                </div>
                <div class="card-body px-5">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Unit kerja</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($units as $idx => $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $units->firstItem() + $idx }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->nama_unit }}
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="2" class="fst-italic text-center">
                                            Data unit kerja belum tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-top pt-3">
                    <div>
                        {{ $units->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
