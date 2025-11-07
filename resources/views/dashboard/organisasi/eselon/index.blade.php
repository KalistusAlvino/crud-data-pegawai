@extends('dashboard.asset.main')
@section('title', 'Dashboard Page | Eselon')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Organisasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Eselon</li>
        </ol>
    </nav>
    <div class="row py-3 px-3">
        <div class="d-inline-flex p-2 justify-content-end gap-4">
            <a href="{{ route('dashboard-eselon-create') }}" class="btn bg-primary border text-white shadow-lg">+ Tambah Eselon</a>
        </div>
        <div class="col-12 p-0 py-4">
            <div class="card boder border-0 shadow-lg rounded-4">
                <div class="card-header bg-transparent card-body-custom pt-5 pb-3">
                    <h4 class="card-title border-0 px-2 py-2">
                        Data Eselon
                    </h4>
                </div>
                <div class="card-body px-5">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Eselon</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($eselons as $idx => $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $eselons->firstItem() + $idx }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->kode_eselon }}
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="2" class="fst-italic text-center">
                                            Data eselon belum tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-top pt-3">
                    <div>
                        {{ $eselons->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
