<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KeuanganMasjidRequest;
use App\Models\KategoriKeuangan;
use App\Models\KeuanganMasjid;

class AdminKeuanganMasjidController extends Controller
{
    protected $model;
    protected $modelKategori;
    protected $viewPath;
    protected $routePrefix;

    public function __construct()
    {
        $this->model = new KeuanganMasjid();
        $this->modelKategori = new KategoriKeuangan();
        $this->viewPath = 'admin.laporanKeuangan.keuanganMasjid';
        $this->routePrefix = 'keuangan-masjid';
    }

    protected function saveData(KeuanganMasjidRequest $request, $id = null)
    {
        $validated = $request->validated();
        if ($id) {
            $kategoris = $this->model::findOrfail($id);
            $kategoris['nominal'] = str_replace('.', '', $request->nominal);
            $kategoris->update($validated);
            $message = 'Data berhasil diperbaharui!';
        } else {
            $request['nominal'] = str_replace('.', '', $request->nominal);
            $this->model::create($validated);
            $message = 'Data berhasil ditambahkan!';
        }

        return redirect()->route($this->routePrefix . '.index')->with('success', $message);
    }

    public function index()
    {
        $kategoris = $this->modelKategori::with(['keuanganMasjid' => function ($query) {
            $query->orderBy('tanggal', 'desc');
        }])->get();

        // dd($kategoris->toArray());

        return view($this->viewPath . '.index', compact('kategoris'));
    }

    public function create()
    {
        $kategori = $this->modelKategori::latest()->get();
        return view($this->viewPath . '.create', compact('kategori'));
    }

    public function show($id)
    {
        // $kategori = $this->modelKategori::findOrFail($id);
        // return view($this->viewPath . '.create', compact('kategori'));
    }

    public function store(KeuanganMasjidRequest $request)
    {
        return $this->saveData($request);
    }

    public function edit($id)
    {
        $keuangan = $this->model::findOrFail($id);
        return view($this->viewPath . '.create', compact('keuangan'));
    }

    public function update(KeuanganMasjidRequest $request, $id)
    {
        return $this->saveData($request, $id);
    }

    public function destroy($id)
    {
        $keuangan = $this->model::findOrFail($id);
        $keuangan->delete();

        return back()->with('success', 'Data berhasil dihapus...');
    }
}
