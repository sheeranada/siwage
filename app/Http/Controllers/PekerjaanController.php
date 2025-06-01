<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pekerjaan::orderBy('pekerjaan', 'ASC')
            ->paginate(10);
        return view('pekerjaan.index', compact('data'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pekerjaan' => 'string|required|max:100',
        ]);
        Pekerjaan::create($validated);
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pekerjaan $pekerjaan)
    {
        $validated = $request->validate([
            'pekerjaan' => 'string|required|max:100',
        ]);
        $pekerjaan->update($validated);
        return redirect()->back()->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pekerjaan $pekerjaan)
    {
        try {
            $pekerjaan->delete();
            return redirect()->back()->with('warning', 'Data berhasil dihapus!');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->back()->with('error', 'Gagal hapus! Data ini masih terhubung dengan data lain.');
            }

            throw $e;
        }
    }
}
