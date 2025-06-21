<?php

namespace App\Http\Controllers;

use App\Models\StatusWarga;
use Illuminate\Http\Request;

class StatusWargaController extends Controller
{
    function index()
    {
        $data = StatusWarga::orderBy('id', 'ASC')->paginate(10);
        return view('status.status_warga', compact('data'));
    }
    function store(Request $request)
    {
        $validated = $request->validate([
            'status_warga' => 'required|string|min:1|max:50',
        ]);
        StatusWarga::create($validated);
        return redirect()->back()->with('success', 'Data berhasil dibuat');
    }
    public function update(Request $request, $id)
    {
        $status_warga = StatusWarga::findOrFail($id);

        $validated = $request->validate([
            'status_warga' => 'required|string|min:1|max:50',
        ]);

        $status_warga->update($validated);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    function destroy($id)
    {
        $status_warga = StatusWarga::findOrFail($id);
        $status_warga->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
