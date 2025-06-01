<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use App\Models\Keluarga;
use App\Models\Warga;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wargas = Warga::all();

        // Group wargas by 'code_from_keluargas'
        $wargasGrouped = $wargas->groupBy('code_from_keluargas')->map(function ($group) {
            // Sort each group: yang status_keluarga == 'KK' di atas (case insensitive)
            return $group->sortByDesc(function ($warga) {
                return Str::lower($warga->statusKeluarga->status_keluarga) === 'kk' ? 1 : 0;
            })->values();
        });

        $kelompok = Kelompok::all();

        $data = Keluarga::with('kelompok', 'wargas')
            ->orderBy('kelompok_id', 'DESC')
            ->get()
            ->unique('kodeKeluarga')
            ->values();

        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $pagedData = $data->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginated = new \Illuminate\Pagination\LengthAwarePaginator(
            $pagedData,
            $data->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('data warga.keluarga', [
            'data' => $paginated,
            'kelompok' => $kelompok,
            'wargasGrouped' => $wargasGrouped
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_kk' => [
                'required',
                'regex:/^\d{3}$/',
            ],
            'catatan' => 'nullable|max:200',
            'kelompok_id' => 'required|exists:kelompoks,id',
        ]);

        Keluarga::create($validated);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keluarga $keluarga)
    {
        $validated = $request->validate([
            'kode_kk' => [
                'required',
                'regex:/^\d{3}$/',
            ],
            'catatan' => 'max:200',
            'kelompok_id' => 'required|exists:kelompoks,id',
        ]);
        $keluarga->update($validated);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $keluarga = Keluarga::find($id);

            if (!$keluarga) {
                return redirect()->back()->with('error', 'Data tidak ditemukan.');
            }

            $keluarga->delete();
            return redirect()->back()->with('info', 'Data berhasil dihapus!');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->back()->with('error', 'Gagal menghapus! Data ini masih digunakan di tabel lain.');
            }

            throw $e;
        }
    }
    private function getDataWarga()
    {
        return Warga::pluck('code_from_keluargas');
    }
}
