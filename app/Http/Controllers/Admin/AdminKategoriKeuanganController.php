<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriKeuanganRequest;
use App\Models\KategoriKeuangan;
use Illuminate\Http\Request;

class AdminKategoriKeuanganController extends Controller
{
    protected $model;
    protected $viewPath;
    protected $routePrefix;

    public function __construct()
    {
        $this->model = new KategoriKeuangan();
        $this->viewPath = 'admin.laporanKeuangan.kategoriKeuangan';
        $this->routePrefix = 'kategori-keuangan';
    }

    protected function saveData(KategoriKeuanganRequest $request, $id = null)
    {
        $validated = $request->validated();
        if ($id) {

            $kategori = $this->model::findOrFail($id);

            $kategori->update($validated);

            $message = 'Data berhasil diperbaharui...';
        } else {
            $this->model::create($validated);

            $message = 'Data berhasil ditambahkan...';
        }

        return redirect()->route($this->routePrefix . '.index')->with('success', $message);
    }

    public function index()
    {
        $kategori = $this->model::latest()->get();
        return view($this->viewPath . '.index', compact('kategori'));
    }

    public function create()
    {
        return view($this->viewPath . '.create');
    }

    public function store(KategoriKeuanganRequest $request)
    {
        return $this->saveData($request);
    }

    public function show($id)
    {
        $kategori = $this->model::findOrFail($id);
        return view($this->viewPath . '.show', compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = $this->model::findOrFail($id);
        return view($this->viewPath . '.edit', compact('kategori'));
    }

    public function update(KategoriKeuanganRequest $request, $id)
    {
        return $this->saveData($request, $id);
    }

    public function destroy($id)
    {
        $kategori = $this->model::findOrFail($id);
        $kategori->delete();

        return back()->with('success', 'Data berhasil dihapus...');
    }
}
