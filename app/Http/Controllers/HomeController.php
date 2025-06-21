<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalLaki = Warga::where('jk', 'L')->count();
        $totalPerempuan = Warga::where('jk', 'P')->count();
        $totalWarga = $totalLaki + $totalPerempuan;

        $kelompokData = Warga::select('kelompok_id', DB::raw('count(*) as total'))
            ->groupBy('kelompok_id')
            ->with('kelompok') // include relasi buat ambil nama
            ->get()
            ->map(function ($item) {
                return [
                    'nama_kelompok' => $item->kelompok->nama_kelompok ?? 'Tidak Diketahui',
                    'total' => $item->total
                ];
            });

        $pendidikanData = Warga::select('pendidikan_id', DB::raw('count(*) as total'))
            ->groupBy('pendidikan_id')
            ->with('pendidikan')
            ->get()
            ->map(function ($item) {
                return [
                    'nama_pendidikan' => $item->pendidikan->pendidikan ?? 'Tidak Diketahui',
                    'total' => $item->total
                ];
            });

        $pekerjaanData = Warga::select('pekerjaan_id', DB::raw('count(*) as total'))
            ->groupBy('pekerjaan_id')
            ->with('pekerjaan')
            ->get()
            ->map(function ($item) {
                return [
                    'nama_pekerjaan' => $item->pekerjaan->pekerjaan ?? 'Tidak Diketahui',
                    'total' => $item->total
                ];
            });
        $umurData = Warga::select(DB::raw('
    CASE
        WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 0 AND 12 THEN "Anak-anak"
        WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 13 AND 17 THEN "Remaja"
        WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 18 AND 59 THEN "Dewasa"
        WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 60 THEN "Lansia"
        ELSE "Tidak Diketahui"
            END AS kategori_umur
        '), DB::raw('count(*) as total'))
            ->whereNotNull('tanggal_lahir')
            ->groupBy('kategori_umur')
            ->get();

        $statusNikahData = Warga::select('status_nikah_id', DB::raw('count(*) as total'))
            ->groupBy('status_nikah_id')
            ->with('statusNikah')
            ->get()
            ->map(function ($item) {
                return [
                    'status' => $item->statusNikah->status_nikah ?? 'Tidak Diketahui',
                    'total' => $item->total
                ];
            });



        return view('home', compact(
            'totalLaki',
            'totalPerempuan',
            'totalWarga',
            'kelompokData',
            'pendidikanData',
            'pekerjaanData',
            'umurData',
            'statusNikahData'
        ));
    }
}
