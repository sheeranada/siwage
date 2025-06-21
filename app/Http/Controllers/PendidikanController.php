<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PendidikanController extends Controller
{
    function index()
    {
        $data = Pendidikan::orderBy('id', 'ASC')->paginate(10);
        return view('profil_kompetensi.pendidikan', compact('data'));
    }
    function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|string|min:2|max:2|unique:pendidikans,id',
            'pendidikan' => 'required|string|min:1|max:50',
        ]);
        Pendidikan::create($validated);
        return redirect()->back()->with('success', 'Data berhasil dibuat');
    }
    public function update(Request $request, $id)
    {
        $pendidikan = Pendidikan::findOrFail($id);

        $validated = $request->validate([
            'id' => [
                'required',
                'string',
                'min:2',
                'max:2',
                Rule::unique('pendidikans', 'id')->ignore($pendidikan->id, 'id'),
            ],
            'pendidikan' => 'required|string|min:1|max:50',
        ]);

        $pendidikan->update($validated);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    function destroy($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
