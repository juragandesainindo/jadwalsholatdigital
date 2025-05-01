<div class="form-group mb-2">
    <label for="title">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
        value="{{ old('title', $data->title ?? '')  }}" placeholder="Input title">
    @error('title')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mb-2">
    <label for="status">Status</label>
    <select name="status" id="status" class="form-control">
        <option value="1" {{ old('status',$data->status ?? '') == '1' ? 'selected' : '' }}>Aktif</option>
        <option value="0" {{ old('status',$data->status ?? '') == '0' ? 'selected' : '' }}>Non Aktif</option>
    </select>
</div>
@if (isset($data) && $data->exists)
<div class="form-group mb-2">
    <label for="order">Urutan</label>
    <select name="order" id="order" class="form-control">
        <option value="{{ $data->order }}">{{ $data->order }}</option>

        @foreach ($running as $i)
        <option value="{{ $i->order }}">{{ $i->order }}</option>
        @endforeach
    </select>
</div>
@endif