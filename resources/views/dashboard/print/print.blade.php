<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pegawai</title>
    <link rel="stylesheet" href="{{ public_path('css/print.css') }}">
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Alamat</th>
                <th>Tgl Lahir</th>
                <th>L/P</th>
                <th>Gol</th>
                <th>Eselon</th>
                <th>Jabatan</th>
                <th>Tempat Tugas</th>
                <th>Agama</th>
                <th>Unit Kerja</th>
                <th>No. HP</th>
                <th>NPWP</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pegawais as $index => $pegawai)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pegawai->nip }}</td>
                    <td style="text-align: left;">{{ $pegawai->nama_pegawai }}</td>
                    <td>{{ $pegawai->tempat_lahir }}</td>
                    <td style="text-align: left;">{{ $pegawai->alamat }}</td>
                    <td>{{ $pegawai->tanggal_lahir ?? '-' }}</td>
                    <td>{{ $pegawai->gender->gender ?? '-' }}</td>
                    <td>{{ $pegawai->golongan->kode_golongan ?? '-' }}</td>
                    <td>{{ $pegawai->eselon->kode_eselon ?? '-' }}</td>
                    <td style="text-align: left;">{{ $pegawai->jabatan->nama_jabatan ?? '-' }}</td>
                    <td>{{ $pegawai->tempat_tugas }}</td>
                    <td>{{ $pegawai->agama->agama ?? '-' }}</td>
                    <td>{{ $pegawai->unit->nama_unit ?? '-' }}</td>
                    <td>{{ $pegawai->no_hp }}</td>
                    <td>{{ $pegawai->npwp }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="15">Tidak ada data pegawai</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
