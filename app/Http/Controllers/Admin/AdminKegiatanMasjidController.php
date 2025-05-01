<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KegiatanMasjidRequest;
use App\Models\KegiatanMasjid;
use Illuminate\Http\Request;

class AdminKegiatanMasjidController extends Controller
{
    protected $model;
    protected $viewPath;
    protected $routePrefix;

    public function __construct()
    {
        $this->model = new KegiatanMasjid();
        $this->viewPath = 'admin.kegiatanMasjid';
        $this->routePrefix = 'kegiatan-masjid';
    }

    protected function saveData(KegiatanMasjidRequest $request, $id = null)
    {
        $validated = $request->validated();

        if ($id) {

            $petugas = $this->model::findOrFail($id);

            $petugas->update($validated);

            $message = 'Data berhasil diperbaharui...';
        } else {
            $this->model::create($validated);

            $message = 'Data berhasil ditambahkan...';
        }

        return redirect()->route($this->routePrefix . '.index')->with('success', $message);
    }


    public function index()
    {
        $kegiatan = $this->model::select('*')
            ->selectRaw("CASE WHEN tanggal >= CURDATE() THEN 0 ELSE 1 END as priority, ABS(DATEDIFF(tanggal, CURDATE())) as day_diff")
            ->orderBy('priority')
            ->orderBy('day_diff')
            ->get();

        return view($this->viewPath . '.index', compact('kegiatan'));
    }

    public function create()
    {
        return view($this->viewPath . '.create');
    }

    public function store(KegiatanMasjidRequest $request)
    {
        return $this->saveData($request);
    }

    public function edit($id)
    {
        $kegiatan = $this->model::findOrFail($id);
        return view($this->viewPath . '.edit', compact('kegiatan'));
    }

    public function update(KegiatanMasjidRequest $request, $id)
    {
        return $this->saveData($request, $id);
    }

    public function destroy($id)
    {
        $kegiatan = KegiatanMasjid::findOrFail($id);
        $kegiatan->delete();

        return back();
    }
}
