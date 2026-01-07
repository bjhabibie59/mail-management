<div class="mb-3">
    <label>Nomor Surat</label>
    <input type="text"
           name="nomor_surat"
           class="form-control"
           value="{{ old('nomor_surat', $surat->nomor_surat ?? '') }}">
    @error('nomor_surat') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="mb-3">
    <label>Tanggal</label>
    <input type="date"
           name="tanggal"
           class="form-control"
           value="{{ old('tanggal', isset($surat) ? $surat->tanggal->format('Y-m-d') : '') }}">
    @error('tanggal') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="mb-3">
    <label>Perihal</label>
    <input type="text"
           name="perihal"
           class="form-control"
           value="{{ old('perihal', $surat->perihal ?? '') }}">
    @error('perihal') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="mb-3">
    <label>Jenis</label>
    <select name="jenis" class="form-control">
        <option value="">-- Pilih --</option>
        <option value="internal" @selected(old('jenis', $surat->jenis ?? '') === 'internal')>Internal</option>
        <option value="external" @selected(old('jenis', $surat->jenis ?? '') === 'external')>External</option>
    </select>
    @error('jenis') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="mb-3">
    <label>File Surat (PDF)</label>
    <input type="file" name="file" class="form-control">
    @error('file') <small class="text-danger">{{ $message }}</small> @enderror

    @isset($surat->file)
        <small>
            File saat ini:
            <a href="{{ asset('storage/'.$surat->file) }}" target="_blank">Lihat</a>
        </small>
    @endisset
</div>
