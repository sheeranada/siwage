<?php

namespace App\Http\Controllers;

use App\Models\StatusWarga;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class StatusWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StatusWarga::orderBy('created_at', 'DESC')->paginate(10);
        return view('status.statusWarga', compact('data'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'status_warga' => 'string|required|max:100',
        ]);
        StatusWarga::create($validated);
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status_warga' => 'string|required|max:100',
        ]);
        $sttsWarga = StatusWarga::findOrFail($id);
        $sttsWarga->update($validated);
        return redirect()->back()->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $sttsWarga = StatusWarga::findOrFail($id);
            $sttsWarga->delete();
            return redirect()->back()->with('warning', 'Data berhasil dihapus!');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->back()->with('error', 'Gagal hapus! Data ini masih digunakan di data lain.');
            }

            throw $e;
        }
    }
}
