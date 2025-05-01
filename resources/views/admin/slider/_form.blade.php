<div class="form-group mb-2">
    <label for="image">Image/Video <sup class="text-danger"><i>maksimal image 1 MB</i></sup></label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
        value="{{ old('image', $slider->image ?? '')  }}">
    @error('image')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    @if (isset($slider) && $slider->exists)
    <img src="{{ asset('storage/'. $slider->image) }}" width="100">
    @endif
</div>
<div class="form-group mb-2">
    <label for="status">Status</label>
    <select name="status" id="status" class="form-control">
        <option value="1" {{ old('status',$slider->status ?? '') == '1' ? 'selected' : '' }}>Aktif</option>
        <option value="0" {{ old('status',$slider->status ?? '') == '0' ? 'selected' : '' }}>Non Aktif</option>
    </select>
</div>
@if (isset($slider) && $slider->exists)
<div class="form-group mb-2">
    <label for="order">Urutan</label>
    <select name="order" id="order" class="form-control">
        <option value="{{ $slider->order }}">{{ $slider->order }}</option>
        @foreach ($sliders as $i)
        <option value="{{ $i->order }}">{{ $i->order }}</option>
        @endforeach
    </select>
</div>
@endif