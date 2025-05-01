<div class="form-group mb-2">
    <label for="kategori_keuangan_id">Kategori</label>
    <select name="kategori_keuangan_id" id="kategori_keuangan_id" class="form-control">
        <option value="">Pilih Kategori Keuangan</option>
        @foreach ($kategori as $item)
        <option value="{{ $item->id }}" {{ old('kategori_keuangan_id',$item->id ?? '') == ' $item->id' ? 'selected'
            : '' }}>
            {{ $item->kategori }}
        </option>
        @endforeach
    </select>
</div>
<div class="form-group mb-2">
    <label for="tanggal">Tanggal</label>
    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
</div>
<div class="form-group mb-2">
    <label for="keterangan">Keterangan</label>
    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan') }}"
        placeholder="contoh: Infak Jum'at">
</div>
<div class="form-group mb-2">
    <label for="jenis">Jenis</label>
    <select name="jenis" id="jenis" class="form-control">
        <option value="">Pilih jenis</option>
        <option value="Masuk" {{ old('jenis')=='Masuk' ? 'selected' : '' }}>Masuk</option>
        <option value="Keluar" {{ old('jenis')=='Keluar' ? 'selected' : '' }}>Keluar</option>
    </select>
</div>
<div class="form-group mb-2">
    <label for="nominal">Nominal</label>
    <input type="text" class="form-control" id="nominal" oninput="formatRupiah(this)" name="nominal"
        value="{{ old('nominal') }}" placeholder="Rp.">
</div>
<div class="form-group mb-2">
    <label for="status">Status</label>
    <select name="status" id="status" class="form-control">
        <option value="1" {{ old('status')=='1' ? 'selected' : '' }}>Aktif</option>
        <option value="0" {{ old('status')=='0' ? 'selected' : '' }}>Non Aktif</option>
    </select>
</div>