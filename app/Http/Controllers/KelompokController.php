<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kelompok::orderBy('kode_kelompok', 'ASC')->paginate(10);
        if ($data->isEmpty()) {
            $data = collect([]);
        }
        return view('kelompok.index', compact('data'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_kelompok' => [
                'required',
                'regex:/^([0][1-9]|[1-9][0-9])$/',
                'unique:kelompoks,kode_kelompok'
            ],
            'nama' => 'required|string|max:100',
            'area' => 'required|string|max:100',
        ]);

        Kelompok::create($validated);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_kelompok' => [
                'required',
                'regex:/^([0][1-9]|[1-9][0-9])$/',
                Rule::unique('kelompoks', 'kode_kelompok')->ignore($id),
            ],
            'nama' => 'required|string|max:100',
            'area' => 'required|string|max:100',
        ]);

        $kelompok = Kelompok::findOrFail($id);

        $kelompok->update($validated);

        return redirect()->back()->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $kelompok = Kelompok::findOrFail($id);
            $kelompok->delete();

            return redirect()->back()->with('warning', 'Data berhasil dihapus!');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->back()->with('error', 'Gagal menghapus! Data ini masih digunakan di tabel lain.');
            }

            throw $e;
        }
    }
}
