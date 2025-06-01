<?php

namespace App\Http\Controllers;

use App\Models\StatusKeluarga;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class StatusKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StatusKeluarga::orderBy('created_at', 'DESC')->paginate(10);
        return view('status.statusKeluarga', compact('data'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'status_keluarga' => 'string|required|max:100',
        ]);
        StatusKeluarga::create($validated);
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status_keluarga' => 'string|required|max:100',
        ]);
        $sttsKeluarga = StatusKeluarga::findOrFail($id);
        $sttsKeluarga->update($validated);
        return redirect()->back()->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $sttsKeluarga = StatusKeluarga::findOrFail($id);
            $sttsKeluarga->delete();
            return redirect()->back()->with('warning', 'Data berhasil dihapus!');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->back()->with('error', 'Gagal hapus! Data ini masih digunakan di data lain.');
            }

            throw $e;
        }
    }
}
