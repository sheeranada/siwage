<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\StatusKeluarga;
use App\Models\StatusNikah;
use App\Models\StatusWarga;
use App\Models\Talenta;
use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    function index()
    {
        $data = Warga::orderBy('nama', 'ASC')
            ->with('statusKeluarga')
            ->join('status_keluargas', 'wargas.status_keluarga_id', '=', 'status_keluargas.id')
            ->where('status_keluargas.status_keluarga', 'KK')
            ->select('wargas.*')
            ->paginate(10);
        return view('warga.keluarga', compact('data'));
    }
    function detail($kode)
    {

        $data = Warga::where('no_induk', 'like', $kode . '.%')
            ->with('statusKeluarga')
            ->orderBy('no_induk')
            ->get();

        $kepala = $data->firstWhere('statusKeluarga.status_keluarga', 'KK');

        return view('warga.detail', [
            'data' => $data,
            'kode' => $kode,
            'kepala' => $kepala,
        ]);
    }
    function search(Request $request)
    {
        try {
            $keyword = $request->get('keyword');

            if ($keyword) {
                $wargas = Warga::with([
                    'statusKeluarga'
                ])->join('status_keluargas', 'wargas.status_keluarga_id', '=', 'status_keluargas.id')
                    ->where(function ($query) use ($keyword) {
                        $query->where('status_keluargas.status_keluarga', 'KK')
                            ->where('nama', 'like', "%{$keyword}%")
                            ->orWhere('no_induk', 'like', "%{$keyword}%")
                            ->orWhere('no_kk', 'like', "%{$keyword}%")
                            ->orWhere('alamat', 'like', "%{$keyword}%");
                    })
                    ->orderBy('nama', 'ASC')
                    ->paginate(10);
            } else {
                $wargas = Warga::with([
                    'statusKeluarga'
                ])
                    ->join('status_keluargas', 'wargas.status_keluarga_id', '=', 'status_keluargas.id')
                    ->orderBy('nama', 'ASC')->paginate(10);
            }

            return response()->json([
                'html' => view('warga._tabel_keluarga', [
                    'data' => $wargas,
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
    function cetakKK($kode)
    {
        Carbon::setLocale('id');
        $tanggal = Carbon::now()->translatedFormat('d F Y');

        $data = Warga::where('no_induk', 'like', $kode . '.%')
            ->with('statusKeluarga')
            ->orderBy('no_induk')
            ->get();


        $kodeKelompok = substr($kode, 0, 2);
        $kelompok = Kelompok::where('kode_kelompok', $kodeKelompok)->value('nama_kelompok');


        $kepala = $data->firstWhere('statusKeluarga.status_keluarga', 'KK');


        return view('warga.cetak_kk', [
            'data' => $data,
            'kode' => $kode,
            'kepala' => $kepala,
            'tanggal' => $tanggal,
            'kelompok' => $kelompok,
        ]);
    }
}
