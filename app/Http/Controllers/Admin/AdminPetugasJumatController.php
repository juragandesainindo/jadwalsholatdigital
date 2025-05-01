<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PetugasJumatRequest;
use App\Models\PetugasJumat;
use Illuminate\Support\Carbon;

class AdminPetugasJumatController extends Controller
{
    protected $model;
    protected $viewPath;
    protected $routePrefix;

    public function __construct()
    {
        $this->model = new PetugasJumat();
        $this->viewPath = 'admin.petugasJumat';
        $this->routePrefix = 'petugas-jumat';
    }

    protected function saveData(PetugasJumatRequest $request, $id = null)
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
        $petugas = $this->model::select('*')
            ->selectRaw("CASE WHEN tanggal >= CURDATE() THEN 0 ELSE 1 END as priority, ABS(DATEDIFF(tanggal, CURDATE())) as day_diff")
            ->orderBy('priority')
            ->orderBy('day_diff')
            ->paginate(10);

        $petugasTerdekat = $this->model::whereDate('tanggal', '>=', Carbon::today())
            ->orderBy('tanggal', 'asc')
            ->first();


        return view($this->viewPath . '.index', compact('petugas', 'petugasTerdekat'));
    }



    public function create()
    {
        return view($this->viewPath . '.create');
    }

    public function store(PetugasJumatRequest $request)
    {
        return $this->saveData($request);
    }

    public function edit($id)
    {
        $petugas = $this->model::findOrFail($id);
        return view($this->viewPath . '.edit', compact('petugas'));
    }

    public function update(PetugasJumatRequest $request, $id)
    {
        return $this->saveData($request, $id);
    }



    public function destroy($id)
    {
        $petugas = $this->model::findOrFail($id);
        $petugas->delete();

        return back()->with('success', 'Data berhasil dihapus...');
    }

    public function deleteAll()
    {
        PetugasJumat::truncate();

        return  back()
            ->with('success', 'Semua data petugas Jumat berhasil dihapus.');
    }
}
