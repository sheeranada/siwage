<?php

namespace App\Http\Controllers;

use App\Models\StatusNikah;
use Illuminate\Http\Request;

class StatusNikahController extends Controller
{
    function index()
    {
        $data = StatusNikah::orderBy('id', 'ASC')->paginate(10);
        return view('status.status_nikah', compact('data'));
    }
    function store(Request $request)
    {
        $validated = $request->validate([
            'status_nikah' => 'required|string|min:1|max:50',
        ]);
        StatusNikah::create($validated);
        return redirect()->back()->with('success', 'Data berhasil dibuat');
    }
    public function update(Request $request, $id)
    {
        $status_nikah = StatusNikah::findOrFail($id);

        $validated = $request->validate([
            'status_nikah' => 'required|string|min:1|max:50',
        ]);

        $status_nikah->update($validated);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    function destroy($id)
    {
        $status_nikah = StatusNikah::findOrFail($id);
        $status_nikah->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
