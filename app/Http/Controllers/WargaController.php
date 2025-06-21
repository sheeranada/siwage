<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Warga;
use App\Models\Talenta;
use App\Models\Kelompok;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\StatusNikah;
use App\Models\StatusWarga;
use Illuminate\Http\Request;
use App\Models\StatusKeluarga;
use Yajra\DataTables\DataTables;

class WargaController extends Controller
{
    function index()
    {
        $kelompoks = Kelompok::all();
        $pendidikans = Pendidikan::all();
        $pekerjaans = Pekerjaan::all();
        $talentas = Talenta::all();
        $statusWargas = StatusWarga::all();
        $statusNikahs = StatusNikah::all();
        $statusKeluargas = StatusKeluarga::all();
        $data = Warga::with(['kelompok', 'pendidikan', 'pekerjaan', 'talenta', 'statusWarga', 'statusNikah', 'statusKeluarga'])
            ->orderBy('nama', 'ASC')
            ->paginate(10);
        return view('warga.warga', compact('data', 'kelompoks', 'pendidikans', 'pekerjaans', 'talentas', 'statusWargas', 'statusNikahs', 'statusKeluargas'));
    }
    function store(Request $request)
    {
        $validated = $request->validate([
            'no_kk' => 'required|string|min:3|max:3',
            'nama' => 'required|string|min:3|max:150',
            'alamat' => 'required|string|min:1|max:300',
            'jk' => 'required|in:L,P',
            'no_telp' => 'nullable|string',
            'catatan' => 'nullable|string',
            'tempat_lahir' => 'nullable|string|min:1|max:100',
            'tanggal_lahir' => 'nullable|date',
            'tempat_baptis' => 'nullable|string|min:1|max:100',
            'tanggal_baptis' => 'nullable|date',
            'tempat_sidhi' => 'nullable|string|min:1|max:100',
            'tanggal_sidhi' => 'nullable|date',
            'tempat_nikah' => 'nullable|string|min:1|max:100',
            'tanggal_nikah' => 'nullable|date',
            'kelompok_id' => 'required|exists:kelompoks,kode_kelompok',
            'pendidikan_id' => 'required|exists:pendidikans,id',
            'pekerjaan_id' => 'required|exists:pekerjaans,id',
            'talenta_id' => 'required|exists:talentas,id',
            'status_warga_id' => 'required|exists:status_wargas,id',
            'status_nikah_id' => 'required|exists:status_nikahs,id',
            'status_keluarga_id' => 'required|exists:status_keluargas,id',
        ]);

        $kodeKelompok = $validated['kelompok_id'];
        $noKk = str_pad($validated['no_kk'], 3, '0', STR_PAD_LEFT);
        $prefix = $kodeKelompok . $noKk;

        $lastUrut = Warga::where('no_induk', 'like', "$prefix%")
            ->get()
            ->map(function ($item) {
                $parts = explode('.', $item->no_induk);
                return isset($parts[1]) ? (int) $parts[1] : 0;
            })
            ->max();

        $nextUrut = str_pad(($lastUrut + 1), 2, '0', STR_PAD_LEFT);

        $tanggalBaptis = Carbon::parse($validated['tanggal_baptis']);
        $bulan = str_pad($tanggalBaptis->format('m'), 2, '0', STR_PAD_LEFT);
        $tahun = $tanggalBaptis->format('y');


        $noInduk = $prefix . '.' . $nextUrut . '.' . $bulan . $tahun;

        $validated['no_induk'] = $noInduk;

        Warga::create($validated);

        return redirect()->back()->with('success', 'Data warga berhasil disimpan.');
    }
    function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_kk' => 'required|string|min:3|max:3',
            'nama' => 'required|string|min:3|max:150',
            'alamat' => 'required|string|min:1|max:300',
            'jk' => 'required|in:L,P',
            'no_telp' => 'nullable|string|min:1|max:14',
            'catatan' => 'nullable|string',
            'tempat_lahir' => 'nullable|string|min:1|max:100',
            'tanggal_lahir' => 'nullable|date',
            'tempat_baptis' => 'nullable|string|min:1|max:100',
            'tanggal_baptis' => 'nullable|date',
            'tempat_sidhi' => 'nullable|string|min:1|max:100',
            'tanggal_sidhi' => 'nullable|date',
            'tempat_nikah' => 'nullable|string|min:1|max:100',
            'tanggal_nikah' => 'nullable|date',
            'kelompok_id' => 'required|exists:kelompoks,kode_kelompok',
            'pendidikan_id' => 'required|exists:pendidikans,id',
            'pekerjaan_id' => 'required|exists:pekerjaans,id',
            'talenta_id' => 'required|exists:talentas,id',
            'status_warga_id' => 'required|exists:status_wargas,id',
            'status_nikah_id' => 'required|exists:status_nikahs,id',
            'status_keluarga_id' => 'required|exists:status_keluargas,id',
        ]);

        $warga = Warga::findOrFail($id);
        $shouldUpdateNoInduk =
            $warga->kelompok_id !== $validated['kelompok_id'] ||
            $warga->no_kk !== $validated['no_kk'] ||
            $warga->tanggal_baptis !== $validated['tanggal_baptis'];

        if ($shouldUpdateNoInduk) {
            $kodeKelompok = $validated['kelompok_id'];
            $noKk = str_pad($validated['no_kk'], 3, '0', STR_PAD_LEFT);
            $prefix = $kodeKelompok . $noKk;

            $lastUrut = Warga::where('no_induk', 'like', "$prefix%")
                ->get()
                ->map(function ($item) {
                    $parts = explode('.', $item->no_induk);
                    return isset($parts[1]) ? (int) $parts[1] : 0;
                })
                ->max();

            $nextUrut = str_pad(($lastUrut + 1), 2, '0', STR_PAD_LEFT);

            if ($validated['tanggal_baptis']) {
                $tanggalBaptis = Carbon::parse($validated['tanggal_baptis']);
                $bulan = str_pad($tanggalBaptis->format('m'), 2, '0', STR_PAD_LEFT);
                $tahun = $tanggalBaptis->format('y');
            } else {
                $bulan = '00';
                $tahun = '00';
            }

            $validated['no_induk'] = $prefix . '.' . $nextUrut . '.' . $bulan . $tahun;
        }

        $warga->update($validated);

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diupdate.');
    }
    function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();

        return redirect()->back()->with('success', 'Data warga berhasil dihapus.');
    }
    function search(Request $request)
    {
        try {
            $keyword = $request->get('keyword');

            if ($keyword) {
                $wargas = Warga::with([
                    'kelompok',
                    'pendidikan',
                    'pekerjaan',
                    'talenta',
                    'statusWarga',
                    'statusNikah',
                    'statusKeluarga'
                ])
                    ->where(function ($query) use ($keyword) {
                        $query->where('nama', 'like', "%{$keyword}%")
                            ->orWhere('no_induk', 'like', "%{$keyword}%")
                            ->orWhere('no_kk', 'like', "%{$keyword}%")
                            ->orWhere('alamat', 'like', "%{$keyword}%");
                    })
                    ->orderBy('nama', 'ASC')
                    ->paginate(10);
            } else {
                $wargas = Warga::with([
                    'kelompok',
                    'pendidikan',
                    'pekerjaan',
                    'talenta',
                    'statusWarga',
                    'statusNikah',
                    'statusKeluarga'
                ])->orderBy('nama', 'ASC')->paginate(10);
            }

            return response()->json([
                'html' => view('warga._tabel_warga', [
                    'data' => $wargas,
                    'kelompoks' => Kelompok::all(),
                    'pendidikans' => Pendidikan::all(),
                    'pekerjaans' => Pekerjaan::all(),
                    'talentas' => Talenta::all(),
                    'statusWargas' => StatusWarga::all(),
                    'statusNikahs' => StatusNikah::all(),
                    'statusKeluargas' => StatusKeluarga::all(),
                ])->render()
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ], 500);
        }
    }
}
