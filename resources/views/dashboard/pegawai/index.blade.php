@extends('dashboard.asset.main')
@section('title', 'Dashboard Page | Data Pegawai')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
        </ol>
    </nav>
    <div class="row py-3 px-3">
        <div class="d-flex flex-column d-md-inline-flex flex-md-row p-2 justify-content-end gap-4">
            <form method="GET" class="d-flex flex-column d-md-inline-flex flex-md-row gap-4"
                action="{{ route('pegawai.index') }}" id="filterForm">
                <div class="input-group w-auto">
                    <span class="input-group-text"><i class="fa-solid fa-filter"></i></span>
                    <select class="form-select" name="filter_unit" id="filterSelectUnit" onchange="this.form.submit()">
                        <option value="">Filter unit</option>
                        @foreach ($units as $item)
                            <option value="{{ $item->id }}" {{ request('filter_unit') == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_unit }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group d-flex">
                    <input type="text" class="form-control" placeholder="Cari" aria-describedby="addon-wrapping"
                        name="nama_pegawai" value="{{ request('nama_pegawai') }}">
                    <button type="submit" class="btn btn-outline-primary input-group-text">
                        <i class="fa-solid fa-magnifying-glass text-primary"></i>
                    </button>
                </div>
            </form>
            <a href="{{ route('pegawai.print',  request()->query()) }}" class="btn btn-outline-primary btn-sm d-flex align-items-center"><i
                    class="fa-solid fa-print me-2"></i>Cetak</a>
            <a href="{{ route('pegawai.create') }}" class="btn bg-primary border text-white shadow-lg">+ Tambah
                Pegawai</a>
        </div>
        <div class="col-12 p-0 py-4">
            <div class="card boder border-0 shadow-lg rounded-4">
                <div class="card-header bg-transparent card-body-custom pt-5 pb-3">
                    <h4 class="card-title border-0 px-2 py-2">
                        Data Pegawai
                    </h4>
                </div>
                <div class="card-body px-5">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tempat Lahir</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Tgl Lahir</th>
                                    <th scope="col">L/P</th>
                                    <th scope="col">Agama</th>
                                    <th scope="col">No. HP</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pegawais as $idx => $item)
                                    <tr class="align-middle text-center">
                                        <td>
                                            {{ $idx + 1 }}
                                        </td>
                                        <td>
                                            {{ $item->nip }}
                                        </td>
                                        <td>
                                            {{ $item->nama_pegawai }}
                                        </td>
                                        <td>
                                            {{ $item->tempat_lahir }}
                                        </td>
                                        <td>
                                            {{ Str::limit($item->alamat, 50) }}
                                        </td>
                                        <td>
                                            {{ $item->tanggal_lahir }}
                                        </td>
                                        <td>
                                            {{ $item->gender->gender }}
                                        </td>
                                        <td>
                                            {{ $item->agama->agama }}
                                        </td>
                                        <td>
                                            {{ $item->no_hp }}
                                        </td>
                                        <td class="d-flex flex-inline gap-2 justify-content-center">
                                            <a href="{{ route('pegawai.show', $item->id) }}"
                                                class="btn btn-outline-secondary btn-sm">
                                                <i class="fa-solid fa-info"></i>
                                            </a>
                                            <a href="{{ route('pegawai.edit', $item) }}"
                                                class="btn btn-outline-primary btn-sm">
                                                <i class="fa-solid fa-file-pen"></i>
                                            </a>
                                            <button type="submit" class="btn btn-outline-danger btn-sm hapusPegawai"
                                                data-bs-toggle="modal" data-bs-target="#deleteConfirmation"
                                                data-url="{{ route('pegawai.destroy', $item->id) }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    @empty
                                    <tr>
                                        <td colspan="15" class="fst-italic text-center">
                                            Data pegawai belum tersedia.
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

    <div class="modal fade" id="deleteConfirmation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="deleteConfirmationModal" aria-hidden="true" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="deletePegawaiForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteConfirmationModal"><span class="text-danger">Apakah anda
                                yakin?</span></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Data yang sudah dihapus tidak bisa dikembalikan!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.hapusPegawai', function() {
                const dataUrl = $(this).data('url');
                console.log(dataUrl);
                $('#deletePegawaiForm').attr('action', dataUrl);
            });
        });
    </script>
@endsection
