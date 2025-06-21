<?php

namespace App\Http\Controllers;

use App\Models\Talenta;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TalentaController extends Controller
{
    function index()
    {
        $data = Talenta::orderBy('id', 'ASC')->paginate(10);
        return view('profil_kompetensi.talenta', compact('data'));
    }
    function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|string|min:2|max:2|unique:talentas,id',
            'talenta' => 'required|string|min:1|max:50',
        ]);
        Talenta::create($validated);
        return redirect()->back()->with('success', 'Data berhasil dibuat');
    }
    public function update(Request $request, $id)
    {
        $talenta = Talenta::findOrFail($id);

        $validated = $request->validate([
            'id' => [
                'required',
                'string',
                'min:2',
                'max:2',
                Rule::unique('talentas', 'id')->ignore($talenta->id, 'id'),
            ],
            'talenta' => 'required|string|min:1|max:50',
        ]);

        $talenta->update($validated);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    function destroy($id)
    {
        $talenta = Talenta::findOrFail($id);
        $talenta->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
