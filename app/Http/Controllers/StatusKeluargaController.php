<?php

namespace App\Http\Controllers;

use App\Models\StatusKeluarga;
use Illuminate\Http\Request;

class StatusKeluargaController extends Controller
{
    function index()
    {
        $data = StatusKeluarga::orderBy('id', 'ASC')->paginate(10);
        return view('status.status_keluarga', compact('data'));
    }
    function store(Request $request)
    {
        $validated = $request->validate([
            'status_keluarga' => 'required|string|min:1|max:50',
        ]);
        StatusKeluarga::create($validated);
        return redirect()->back()->with('success', 'Data berhasil dibuat');
    }
    public function update(Request $request, $id)
    {
        $status_keluarga = StatusKeluarga::findOrFail($id);

        $validated = $request->validate([
            'status_keluarga' => 'required|string|min:1|max:50',
        ]);

        $status_keluarga->update($validated);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    function destroy($id)
    {
        $status_keluarga = StatusKeluarga::findOrFail($id);
        $status_keluarga->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
