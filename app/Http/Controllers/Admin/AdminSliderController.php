<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSliderController extends Controller
{
    protected $model;
    protected $viewPath;
    protected $routePrefix;

    public function __construct()
    {
        $this->model = new Slider();
        $this->viewPath = 'admin.slider';
        $this->routePrefix = 'slider';
    }

    protected function saveData(Request $request, $id = null)
    {

        if ($id) {
            $request->validate([
                'image' => 'nullable|mimes:png,jpg,jpeg,mp4,webm,ogg|max:10240',
                'status' => 'required',
                'order' => 'nullable',
                'type' => 'nullable|in:image,video' // Tambahkan validasi untuk type
            ], [
                'image.mimes' => 'File harus berupa gambar (png, jpg, jpeg) atau video (mp4, webm, ogg)!',
                'image.max' => 'Size Image/Video maksimal 1 MB!',
                'status.required' => 'Status wajib diisi!',
                'type.in' => 'Tipe media harus image atau video!'
            ]);

            $slider = $this->model::findOrFail($id);

            $newOrder = $request->order; // Urutan baru yang diinput admin
            $oldOrder = $slider->order; // Urutan lama sebelum diubah

            if ($newOrder != $oldOrder) {
                // Jika ada running text lain dengan urutan yang sama, geser urutan lain
                if ($newOrder > $oldOrder) {
                    // Jika urutan naik (misal dari 3 ke 2), geser ke bawah
                    $this->model::whereBetween('order', [$oldOrder + 1, $newOrder])
                        ->decrement('order');
                } else {
                    // Jika urutan turun (misal dari 2 ke 1), geser ke atas
                    $this->model::whereBetween('order', [$newOrder, $oldOrder - 1])
                        ->increment('order');
                }

                // Update running text yang dipindah
            }

            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                    Storage::disk('public')->delete($slider->image);
                }

                // Simpan gambar baru
                $imagePath = $request->file('image')->store('images', 'public');
                $slider->image = $imagePath;
            }

            $slider->update([
                'image' => $slider->image,
                'status' => $request->status,
                'order' => $newOrder,
            ]);

            $message = 'Data berhasil diperbaharui...';
        } else {
            $request->validate([
                'image' => 'required|mimes:png,jpg,jpeg,mp4|max:1024',
                'status' => 'required',
                'order' => 'nullable',
            ], [
                'image.required' => 'Image/Video wajib diisi!',
                'image.mimes' => 'Image/Video wajib extensi png, jpg, jpeg, atau mp4!',
                'image.max' => 'Size Image/Video maksimal 1 MB!',
                'status.required' => 'Status wajib diisi!',
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
            }

            $lastOrder = $this->model::max('order') ?? 0;

            $this->model::create([
                'image' => $imagePath,
                'status' => $request->status,
                'order' => $lastOrder + 1,
            ]);


            $message = 'Data berhasil ditambahkan...';
        }

        return redirect()->route($this->routePrefix . '.index')->with('success', $message);
    }

    public function index()
    {
        $slider = $this->model::orderBy('order', 'asc')->get();
        return view($this->viewPath . '.index', compact('slider'));
    }

    public function create()
    {
        return view($this->viewPath . '.create');
    }

    public function store(Request $request)
    {
        return $this->saveData($request);
    }

    public function edit($id)
    {
        $slider = $this->model::findOrFail($id);

        $sliders = $this->model::orderBy('order', 'asc')->get();
        return view($this->viewPath . '.edit', compact('slider', 'sliders'));
    }

    public function update(Request $request, $id)
    {
        return $this->saveData($request, $id);
    }

    public function destroy($id)
    {

        $slider = $this->model::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        // Reorder ulang data
        $items = $this->model::orderBy('order')->get();
        foreach ($items as $index => $itm) {
            $itm->order = $index + 1;
            $itm->save();
        }

        return back()->with('success', 'Data berhasil dihapus...');
    }
}