<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RunningTextRequest;
use App\Models\RunningText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRunningTextController extends Controller
{
    protected $model;
    protected $viewPath;
    protected $routePrefix;

    public function __construct()
    {
        $this->model = new RunningText();
        $this->viewPath = 'admin.runningText';
        $this->routePrefix = 'running-text';
    }

    protected function saveData(RunningTextRequest $request, $id = null)
    {
        $request->validated();

        if ($id) {

            $data = $this->model::findOrFail($id);
            $newOrder = $request->order; // Urutan baru yang diinput admin
            $oldOrder = $data->order; // Urutan lama sebelum diubah

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
            $data->update([
                'title' => $request->title,
                'status' => $request->status,
                'order' => $newOrder,
            ]);


            $message = 'Data berhasil diperbaharui...';
        } else {
            // $data = $this->model::create($validated);

            $order = $this->model::max('order') ?? 0;
            // dd($order);
            $this->model::create([
                'title' => $request->title,
                'status' => $request->status,
                'order' => $order + 1,
            ]);
            $message = 'Data berhasil ditambahkan...';
        }

        return redirect()->route($this->routePrefix . '.index')->with('success', $message);
    }

    public function index()
    {
        $running = $this->model::orderBy('order', 'asc')->get();
        return view($this->viewPath . '.index', compact('running'));
    }

    public function create()
    {
        return view($this->viewPath . '.create');
    }

    public function store(RunningTextRequest $request)
    {
        return $this->saveData($request);
    }

    public function edit($id)
    {
        $data = $this->model::findOrFail($id);
        $running = $this->model::orderBy('order', 'asc')->get();
        // dd($running->toArray());
        return view($this->viewPath . '.edit', compact('data', 'running'));
    }

    public function update(RunningTextRequest $request, $id)
    {
        return $this->saveData($request, $id);
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            // 1. Dapatkan data yang akan dihapus beserta order-nya
            $data = $this->model::findOrFail($id);
            $deletedOrder = $data->order;

            // 2. Hapus data
            $data->delete();

            // 3. Turunkan order data yang order-nya lebih tinggi
            $this->model::where('order', '>', $deletedOrder)
                ->decrement('order'); // Kurangi 1 untuk semua order di atasnya

            // Contoh: Jika order 3 dihapus:
            // - Order 4 menjadi 3
            // - Order 5 menjadi 4, dst
        });

        return back()->with('message', 'Data berhasil dihapus...');
    }
}
