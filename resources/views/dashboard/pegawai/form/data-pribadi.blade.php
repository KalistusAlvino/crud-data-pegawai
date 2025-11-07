<div class="col-12">
    <div class="row g-3">
        <div class="col-12 col-md-6">
            <div class="text-center">
                <label for="fotoPegawai" class="form-label d-block mb-2">Foto Pegawai<span
                        class="text-danger">*</span></label>
                <img id="previewFoto"
                    src="{{ (isset($pegawai) && $pegawai->foto_path) ? asset('storage/'.$pegawai->foto_path) : asset('storage/dashboard/default-image.png') }}"
                    alt="Preview Foto" class="img-thumbnail rounded-4 mb-3 shadow-sm"
                    style="width: 96px; height: 96px; object-fit: cover;">
                <input class="form-control" type="file" id="fotoPegawai" name="foto_path" accept="image/*"
                    onchange="previewImage(event)">
                <div class="form-text mt-2">
                    Format: JPG, PNG, Max 2MB
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="mb-3">
                <label for="inputNIP" class="form-label">NIP<span class="text-danger">*</span></label>
                <input type="text" class="form-control only-number" id="inputNIP" name="nip"
                    value="{{ old('nip', $pegawai->nip ?? '') }}" required>
                <div class="form-text">
                    Contoh: 1999****
                </div>
            </div>
            <div class="mb-3">
                <label for="inputNPWP" class="form-label">NPWP<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="inputNPWP" name="npwp"
                    value="{{ old('npwp', $pegawai->npwp ?? '') }}" required>
                <div class="form-text">
                    Contoh: 12.345.***.*-***.***
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3">
        <div class="col-12">
            <div class="mb-3">
                <label for="inputNama" class="form-label">Nama<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="inputNama" name="nama_pegawai"
                    value="{{ old('nama_pegawai', $pegawai->nama_pegawai ?? '') }}" required>
                <div class="form-text">
                    Contoh: Kalistus Alvino
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3">
        <div class="col-12 col-md-6">
            <div class="mb-3">
                <label for="tempatLahir" class="form-label">Tempat Lahir<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="tempatLahir" name="tempat_lahir"
                    value="{{ old('tempat_lahir', $pegawai->tempat_lahir ?? '') }}" required>
                <div class="form-text">
                    Contoh: Bekasi
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="mb-3">
                <label for="tanggalLahir" class="form-label">Tanggal Lahir<span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="tanggalLahir" name="tanggal_lahir"
                    value="{{ old('tanggal_lahir', $pegawai->tanggal_lahir ?? '') }}" required>
            </div>
        </div>
    </div>
    <div class="row g-3">
        <div class="col-12 col-md-6">
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="alamat" name="alamat"
                    value="{{ old('alamat', $pegawai->alamat ?? '') }}" required>
                <div class="form-text">
                    Contoh: Jalan Merpati Putih No. 45, RT 003/RW 005, Kelurahan Sukajadi
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="mb-3">
                <label for="no_hp" class="form-label">No. Handphone<span class="text-danger">*</span></label>
                <input type="text" class="form-control  only-number" id="no_hp" name="no_hp"
                    value="{{ old('no_hp', $pegawai->no_hp ?? '') }}" required>
                <div class="form-text">
                    Contoh: 0822209*****
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3">
        <div class="col-12 col-md-6">
            <div class="mb-3">
                <label for="agama" class="form-label">Agama<span class="text-danger">*</span></label>
                <select id="agama" class="form-select" aria-label="Default select example" name="agama_id"
                    required>
                    <option selected>Pilih agama</option>
                    @foreach ($agamas as $item)
                        <option value={{ $item->id }}
                            {{ old('agama_id', $pegawai->agama_id ?? '') == $item->id ? 'selected' : '' }}>
                            {{ $item->agama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin<span class="text-danger">*</span></label>
                <div class="radio mt-2" id="gender">
                    @forelse ($genders as $idx => $item)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender_id"
                                id="{{ $item->id }}"
                                {{ old('gender_id', $pegawai->gender_id ?? ($idx == 0 ? $item->id : '')) == $item->id ? 'checked' : '' }}
                                value="{{ $item->id }}">
                            <label class="form-check-label" for="{{ $item->id }}">{{ $item->gender }}</label>
                        </div>
                    @empty
                        <div class="text-muted fst-italic">
                            Tidak ada data jenis kelamin tersedia.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    document.querySelectorAll('.only-number').forEach(input => {
        input.addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, '');
        });
    });

    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('previewFoto');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
