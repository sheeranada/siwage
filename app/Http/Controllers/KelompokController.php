<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KelompokController extends Controller
{
    function index()
    {
        $data = Kelompok::orderBy('kode_kelompok', 'ASC')->paginate(10);
        return view('kelompok.kelompok', compact('data'));
    }
    function store(Request $request)
    {
        $validated = $request->validate([
            'kode_kelompok' => 'required|string|min:2|max:2|unique:kelompoks,kode_kelompok',
            'nama_kelompok' => 'required|string|min:1|max:50',
            'area' => 'required|in:wilayah,induk,cajem'
        ]);
        Kelompok::create($validated);
        return redirect()->back()->with('success', 'Data berhasil dibuat');
    }
    public function update(Request $request, $kode_kelompok)
    {
        $kelompok = Kelompok::findOrFail($kode_kelompok);

        $validated = $request->validate([
            'kode_kelompok' => [
                'required',
                'string',
                'min:2',
                'max:2',
                Rule::unique('kelompoks', 'kode_kelompok')->ignore($kelompok->kode_kelompok, 'kode_kelompok'),
            ],
            'nama_kelompok' => 'required|string|min:1|max:50',
            'area' => 'required|in:wilayah,induk,cajem'
        ]);

        $kelompok->update($validated);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    function destroy($kode_kelompok)
    {
        $kelompok = Kelompok::findOrFail($kode_kelompok);
        $kelompok->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
