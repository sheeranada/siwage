<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PekerjaanController extends Controller
{
    function index()
    {
        $data = Pekerjaan::orderBy('id', 'ASC')->paginate(10);
        return view('profil_kompetensi.pekerjaan', compact('data'));
    }
    function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|string|min:2|max:2|unique:pekerjaans,id',
            'pekerjaan' => 'required|string|min:1|max:50',
        ]);
        Pekerjaan::create($validated);
        return redirect()->back()->with('success', 'Data berhasil dibuat');
    }
    public function update(Request $request, $id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);

        $validated = $request->validate([
            'id' => [
                'required',
                'string',
                'min:2',
                'max:2',
                Rule::unique('pekerjaans', 'id')->ignore($pekerjaan->id, 'id'),
            ],
            'pekerjaan' => 'required|string|min:1|max:50',
        ]);

        $pekerjaan->update($validated);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    function destroy($id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
