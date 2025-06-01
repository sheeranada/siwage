<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use App\Models\StatusNikah;
use App\Models\Warga;
use Illuminate\Http\Request;

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
        $totalWarga = Warga::count();
        $jumlahLaki = Warga::where('jk', 'L')->count();
        $jumlahPerempuan = Warga::where('jk', 'P')->count();

        // Usia kelompok
        $now = \Carbon\Carbon::now();

        $usiaAnak = Warga::whereDate('tanggal_lahir', '>', $now->subYears(12))->count(); // < 12 tahun
        $usiaRemaja = Warga::whereBetween('tanggal_lahir', [
            $now->copy()->subYears(18),
            $now->copy()->subYears(13),
        ])->count(); // 13-18 tahun
        $usiaDewasa = Warga::whereBetween('tanggal_lahir', [
            $now->copy()->subYears(59),
            $now->copy()->subYears(19),
        ])->count(); // 19-59 tahun
        $usiaLansia = Warga::whereDate('tanggal_lahir', '<', $now->subYears(60))->count(); // >= 60 tahun

        // Ambil semua status nikah
        $statusNikahs = StatusNikah::all();
        $totalStatusNikah = StatusNikah::count();

        // Inisialisasi array untuk chart
        $statusLabels = [];
        $statusData = [];

        foreach ($statusNikahs as $status) {
            $statusLabels[] = $status->status_nikah;

            // Hitung jumlah warga untuk tiap status nikah
            $count = Warga::where('status_nikah_id', $status->id)->count();
            $statusData[] = $count;
        }

        // Jika mau, bisa juga hitung warga yang gak punya status nikah (null)
        $countNull = Warga::whereNull('status_nikah_id')->count();
        if ($countNull > 0) {
            $statusLabels[] = 'Tidak diketahui';
            $statusData[] = $countNull;
        }

        // pekerjaan
        $pekerjaanStats = Pekerjaan::withCount('warga')->get();

        return view('home', [
            'totalWarga' => $totalWarga,
            'jumlahLaki' => $jumlahLaki,
            'jumlahPerempuan' => $jumlahPerempuan,
            'usiaAnak' => $usiaAnak,
            'usiaRemaja' => $usiaRemaja,
            'usiaDewasa' => $usiaDewasa,
            'usiaLansia' => $usiaLansia,
            'statusLabels' => $statusLabels,
            'statusData' => $statusData,
            'totalStatusNikah' => $totalStatusNikah,
            'pekerjaanStats' => $pekerjaanStats,
        ]);
    }
}
