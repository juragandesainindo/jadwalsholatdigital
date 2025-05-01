<div class="form-group mb-2">
    <label for="tanggal">Tanggal</label>
    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal"
        value="{{ old('tanggal', $petugas->tanggal ?? '')  }}">
    @error('tanggal')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mb-2">
    <label for="imam">Imam</label>
    <input type="text" class="form-control @error('imam') is-invalid @enderror" id="imam" name="imam"
        value="{{ old('imam', $petugas->imam ?? '')  }}" placeholder="input nama imam">
    @error('imam')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mb-2">
    <label for="khotib">Khotib</label>
    <input type="text" class="form-control @error('khotib') is-invalid @enderror" id="khotib" name="khotib"
        value="{{ old('khotib', $petugas->khotib ?? '')  }}" placeholder="input nama khotib">
    @error('khotib')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mb-2">
    <label for="muazin">Muazin</label>
    <input type="text" class="form-control @error('muazin') is-invalid @enderror" id="muazin" name="muazin"
        value="{{ old('muazin', $petugas->muazin ?? '')  }}" placeholder="input nama muazin">
    @error('muazin')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mb-2">
    <label for="judul">Judul Khutbah</label>
    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"
        value="{{ old('judul', $petugas->judul ?? '')  }}" placeholder="input judul khutbah">
    @error('judul')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
{{-- <div class="form-group">
    <label for="status">Status</label>
    <select name="status" id="status" class="form-control">
        <option value="1" {{ old('status',$petugas->status ?? '') == '1' ? 'selected' : '' }}>Aktif</option>
        <option value="0" {{ old('status',$petugas->status ?? '') == '0' ? 'selected' : '' }}>Non Aktif</option>
    </select>
</div> --}}