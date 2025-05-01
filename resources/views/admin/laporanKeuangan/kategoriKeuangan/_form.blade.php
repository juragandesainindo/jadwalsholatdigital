<div class="form-group">
    <label for="kategori">Kategori</label>
    <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori"
        value="{{ old('kategori', $kategori->kategori ?? '')  }}" placeholder="contoh: KAS PEMBANGUNAN MASJID">
    @error('kategori')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>