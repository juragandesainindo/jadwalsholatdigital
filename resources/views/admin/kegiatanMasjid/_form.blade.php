<div class="form-group mb-2">
    <label for="nama_kegiatan">Kegiatan</label>
    <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror" id="nama_kegiatan"
        name="nama_kegiatan" value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan ?? '')  }}"
        placeholder="contoh: kajian subuh">
    @error('nama_kegiatan')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mb-2">
    <label for="ustad">Ustad</label>
    <input type="text" class="form-control @error('ustad') is-invalid @enderror" id="ustad" name="ustad"
        value="{{ old('ustad', $kegiatan->ustad ?? '')  }}" placeholder="nama ustad">
    @error('ustad')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mb-2">
    <label for="tanggal">Tanggal</label>
    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal"
        value="{{ old('tanggal', $kegiatan->tanggal ?? '')  }}">
    @error('tanggal')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mb-2">
    <label for="jam">jam</label>
    <input type="time" class="form-control @error('jam') is-invalid @enderror" id="jam" name="jam"
        value="{{ old('jam', $kegiatan->jam ?? '')  }}">
    @error('jam')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mb-2">
    <label for="status">Status</label>
    <select name="status" id="status" class="form-control">
        <option value="1" {{ old('status',$kegiatan->status ?? '') == '1' ? 'selected' : '' }}>Aktif</option>
        <option value="0" {{ old('status',$kegiatan->status ?? '') == '0' ? 'selected' : '' }}>Non Aktif</option>
    </select>
</div>