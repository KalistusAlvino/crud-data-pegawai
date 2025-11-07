@extends('dashboard.asset.main')
@section('title', 'Dashboard Page | Data Pegawai')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Pegawai</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
        </ol>
    </nav>
    <div class="col-12 p-0 py-4">
        <div class="card boder border-0 shadow-lg rounded-4">
            <div class="card-header bg-transparent card-body-custom pt-4 pb-3">
                <h4 class="card-title border-0 px-2">
                    Data Pegawai
                </h4>
            </div>
            <div class="card-body px-5">
                <h5 class="fw-bold mb-3 text-primary">Data Pribadi</h5>
                <img id="previewFoto" src="{{ asset('storage/' . $pegawai->foto_path) }}" alt="Preview Foto"
                    class="img-thumbnail rounded-4 mb-3 shadow-sm" style="width: 96px; height: 96px; object-fit: cover;">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>NIP:</strong> {{ $pegawai->nip }}</p>
                        <p><strong>Nama:</strong> {{ $pegawai->nama_pegawai }}</p>
                        <p><strong>Tempat, Tgl Lahir:</strong> {{ $pegawai->tempat_lahir }},
                            {{ $pegawai->tanggal_lahir }}</p>
                        <p><strong>Jenis Kelamin:</strong> {{ $pegawai->gender->gender ?? '-' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Alamat:</strong> {{ $pegawai->alamat }}</p>
                        <p><strong>Agama:</strong> {{ $pegawai->agama->agama ?? '-' }}</p>
                        <p><strong>No. HP:</strong> {{ $pegawai->no_hp ?? '-' }}</p>
                        <p><strong>NPWP:</strong> {{ $pegawai->npwp ?? '-' }}</p>
                    </div>
                </div>

                <hr>

                <h5 class="fw-bold mb-3 text-primary">Data Kepegawaian</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Golongan:</strong> {{ $pegawai->golongan->kode_golongan ?? '-' }}</p>
                        <p><strong>Eselon:</strong> {{ $pegawai->eselon->kode_eselon ?? '-' }}</p>
                        <p><strong>Jabatan:</strong> {{ $pegawai->jabatan->nama_jabatan ?? '-' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Tempat Tugas:</strong> {{ $pegawai->tempat_tugas ?? '-' }}</p>
                        <p><strong>Unit Kerja:</strong> {{ $pegawai->unit->nama_unit ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
