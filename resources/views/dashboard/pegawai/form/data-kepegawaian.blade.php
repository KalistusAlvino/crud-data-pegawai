<div class="col-12">
    <div class="row g-3">
        <div class="col-12 col-md-6">
            <div class="mb-3">
                <label for="golongan" class="form-label">Golongan<span class="text-danger">*</span></label>
                <select id="golongan" class="form-select" aria-label="Default select example" name="gol_id" required>
                    <option selected>Pilih golongan</option>
                    @foreach ($golongans as $item)
                        <option value={{ $item->id }}
                            {{ old('gol_id', $pegawai->gol_id ?? '') == $item->id ? 'selected' : '' }}>
                            {{ $item->kode_golongan }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="mb-3">
                <label for="eselon" class="form-label">Eselon<span class="text-danger">*</span></label>
                <select id="eselon" class="form-select" aria-label="Default select example" name="eselon_id"
                    required>
                    <option selected>Pilih eselon</option>
                    @foreach ($eselons as $item)
                        <option value={{ $item->id }}
                            {{ old('eselon_id', $pegawai->eselon_id ?? '') == $item->id ? 'selected' : '' }}>{{ $item->kode_eselon }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan<span class="text-danger">*</span></label>
                <select id="jabatan" class="form-select" aria-label="Default select example" name="jabatan_id"
                    required>
                    <option selected>Pilih jabatan</option>
                    @foreach ($jabatans as $item)
                        <option value={{ $item->id }}
                            {{ old('jabatan_id', $pegawai->jabatan_id ?? '') == $item->id ? 'selected' : '' }}>{{ $item->nama_jabatan }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="mb-3">
                <label for="unit" class="form-label">Unit<span class="text-danger">*</span></label>
                <select id="unit" class="form-select" aria-label="Default select example" name="unit_id" required>
                    <option selected>Pilih unit</option>
                    @foreach ($units as $item)
                        <option value={{ $item->id }}
                            {{ old('unit_id', $pegawai->unit_id ?? '') == $item->id ? 'selected' : '' }}>{{ $item->nama_unit }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="inputTempat" class="form-label">Tempat Tugas<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="inputTempat" name="tempat_tugas" value="{{ old('tempat_tugas', $pegawai->tempat_tugas ?? '') }}" required>
                <div class="form-text">
                    Contoh: Jakarta, Bali, Yogyakarta, Bogor
                </div>
            </div>
        </div>
    </div>
</div>
