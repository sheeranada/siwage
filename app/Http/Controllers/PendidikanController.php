<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pendidikan::orderBy('pendidikan', 'DESC')
            ->paginate(10);
        return view('pendidikan.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pendidikan' => 'string|required|max:100',
        ]);
        Pendidikan::create($validated);
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendidikan $pendidikan)
    {
        $validated = $request->validate([
            'pendidikan' => 'string|required|max:100',
        ]);
        $pendidikan->update($validated);
        return redirect()->back()->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendidikan $pendidikan)
    {
        try {
            $pendidikan->delete();
            return redirect()->back()->with('warning', 'Data berhasil dihapus!');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->back()->with('error', 'Gagal hapus! Data ini masih digunakan di data lain.');
            }

            throw $e;
        }
    }
}
