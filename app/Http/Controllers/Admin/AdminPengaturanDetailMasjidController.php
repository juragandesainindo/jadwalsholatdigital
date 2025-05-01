<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengaturanDetailMasjid;
use Illuminate\Http\Request;

class AdminPengaturanDetailMasjidController extends Controller
{
    protected $model;
    protected $viewPath;
    protected $routePrefix;

    public function __construct()
    {
        $this->model = new PengaturanDetailMasjid();
        $this->viewPath = 'admin.pengaturan.pengaturanDetailMasjid';
        $this->routePrefix = 'admin.pengaturan-detail-masjid';
    }

    protected function saveData(Request $request, $id = null)
    {

        if ($id) {

            $detailMasjid = $this->model::findOrFail($id);

            $detailMasjid->update($request->all());

            $message = 'Data berhasil diperbaharui...';
        }

        return redirect()->route($this->routePrefix . '.index')->with('success', $message);
    }

    public function index()
    {
        $detailMasjid = $this->model::latest()->get();
        return view($this->viewPath . '.index', compact('detailMasjid'));
    }

    public function edit($id)
    {
        $detailMasjid = $this->model::findOrFail($id);
        return view($this->viewPath . '.edit', compact('detailMasjid'));
    }

    public function update(Request $request, $id)
    {
        return $this->saveData($request, $id);
    }
}
