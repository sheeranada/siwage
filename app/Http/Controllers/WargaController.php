<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use App\Models\Keluarga;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\StatusKeluarga;
use App\Models\StatusNikah;
use App\Models\StatusWarga;
use App\Models\Talenta;
use App\Models\Warga;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keluargas = Keluarga::all();
        $kelompoks = Kelompok::all();
        $talentas = Talenta::all();
        $pendidikans = Pendidikan::all();
        $pekerjaans = Pekerjaan::all();
        $statusKeluarga = StatusKeluarga::all();
        $statusWarga = StatusWarga::all();
        $statusNikah = StatusNikah::all();
        $data = Warga::join('status_keluargas', 'wargas.status_keluarga_id', '=', 'status_keluargas.id')
            ->select('wargas.*') // ini penting!
            ->orderByRaw("FIELD(status_keluargas.status_keluarga, 'KK', 'Istri', 'Anak', 'Orang Tua', 'Mertua', 'Adik', 'Keponakan', 'Kakek', 'Nenek', 'Cucu')")
            ->orderBy('wargas.nama', 'ASC')
            ->with([
                'keluarga',
                'talenta',
                'pendidikan',
                'pekerjaan',
                'statusKeluarga',
                'statusWarga',
                'statusNikah'
            ])
            ->get();


        return view('data warga.warga', compact(
            'data',
            'keluargas',
            'talentas',
            'pendidikans',
            'pekerjaans',
            'statusKeluarga',
            'statusWarga',
            'statusNikah',
            'kelompoks',
        ));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // data warga
            'nama' => 'required|string|max:200',
            'alamat' => 'required|string|max:200',
            'telp' => 'required|string|max:200',
            'jk' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:200',
            'tanggal_lahir' => 'required|date',
            'tempat_baptis' => 'nullable|string|max:200',
            'tanggal_baptis' => 'nullable|date',
            'tempat_sidhi' => 'nullable|string|max:200',
            'tanggal_sidhi' => 'nullable|date',
            'tempat_menikah' => 'nullable|string|max:200',
            'tanggal_menikah' => 'nullable|date',
            'talenta_id' => 'required|uuid|exists:talentas,id',
            'pendidikan_id' => 'required|uuid|exists:pendidikans,id',
            'pekerjaan_id' => 'required|uuid|exists:pekerjaans,id',
            'status_keluarga_id' => 'required|uuid|exists:status_keluargas,id',
            'status_warga_id' => 'required|uuid|exists:status_wargas,id',
            'status_nikah_id' => 'required|uuid|exists:status_nikahs,id',

            // data keluarga
            'kode_kk' => 'required|string|max:200',
            'catatan' => 'nullable|string|max:200',
            'kelompok_id' => 'required|uuid|exists:kelompoks,id',
        ]);

        DB::transaction(function () use ($request) {
            // 1. Insert keluarga
            $keluarga = Keluarga::create([
                'kode_kk' => $request->kode_kk,
                'catatan' => $request->catatan,
                'kelompok_id' => $request->kelompok_id,
            ]);

            // 2. Ambil kode kelompok dari relasi
            $kodeKelompok = $keluarga->kelompok->kode_kelompok;

            // 3. Gabungkan kode kelompok + kode KK untuk "code_from_keluargas"
            $codeFromKeluargas = $kodeKelompok . $request->kode_kk;

            // 4. Hitung urutan berdasarkan code_from_keluargas
            $jumlahWarga = Warga::where('code_from_keluargas', $codeFromKeluargas)->count() + 1;

            // 5. Format urutan ke dua digit (ex: 01, 02)
            $angkaUrut = str_pad($jumlahWarga, 2, '0', STR_PAD_LEFT);

            // 6. Ambil dua digit bulan & tahun dari tanggal baptis
            $tanggalBaptis = $request->tanggal_baptis;
            $bulanTahunBaptis = '';

            if ($tanggalBaptis) {
                $bulan = date('m', strtotime($tanggalBaptis)); // ex: 07
                $tahun = date('y', strtotime($tanggalBaptis)); // ex: 23
                $bulanTahunBaptis = '.' . $bulan . $tahun;
            }

            // 7. Gabungkan jadi no_induk lengkap
            $noInduk = $codeFromKeluargas . '.' . $angkaUrut . $bulanTahunBaptis;

            // 8. Simpan warga
            Warga::create([
                'no_induk' => $noInduk,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'jk' => $request->jk,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_baptis' => $request->tempat_baptis,
                'tanggal_baptis' => $request->tanggal_baptis,
                'tempat_sidhi' => $request->tempat_sidhi,
                'tanggal_sidhi' => $request->tanggal_sidhi,
                'tempat_menikah' => $request->tempat_menikah,
                'tanggal_menikah' => $request->tanggal_menikah,
                'keluarga_id' => $keluarga->id,
                'talenta_id' => $request->talenta_id,
                'pendidikan_id' => $request->pendidikan_id,
                'pekerjaan_id' => $request->pekerjaan_id,
                'status_keluarga_id' => $request->status_keluarga_id,
                'status_warga_id' => $request->status_warga_id,
                'status_nikah_id' => $request->status_nikah_id,
                'code_from_keluargas' => $codeFromKeluargas,
            ]);
        });

        return redirect()->back()->with('success', 'Data warga dan keluarga berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Warga $warga)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // data warga
            'nama' => 'required|string|max:200',
            'alamat' => 'required|string|max:200',
            'telp' => 'required|string|max:200',
            'jk' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:200',
            'tanggal_lahir' => 'required|date',
            'tempat_baptis' => 'nullable|string|max:200',
            'tanggal_baptis' => 'nullable|date',
            'tempat_sidhi' => 'nullable|string|max:200',
            'tanggal_sidhi' => 'nullable|date',
            'tempat_menikah' => 'nullable|string|max:200',
            'tanggal_menikah' => 'nullable|date',
            'talenta_id' => 'required|uuid|exists:talentas,id',
            'pendidikan_id' => 'required|uuid|exists:pendidikans,id',
            'pekerjaan_id' => 'required|uuid|exists:pekerjaans,id',
            'status_keluarga_id' => 'required|uuid|exists:status_keluargas,id',
            'status_warga_id' => 'required|uuid|exists:status_wargas,id',
            'status_nikah_id' => 'required|uuid|exists:status_nikahs,id',

            // data keluarga
            'kode_kk' => 'required|string|max:200',
            'catatan' => 'nullable|string|max:200',
            'kelompok_id' => 'required|uuid|exists:kelompoks,id',
        ]);

        DB::transaction(function () use ($request, $id) {
            $warga = Warga::findOrFail($id);
            $keluarga = $warga->keluarga;

            // Update keluarga
            $keluarga->update([
                'kode_kk' => $request->kode_kk,
                'catatan' => $request->catatan,
                'kelompok_id' => $request->kelompok_id,
            ]);

            // Ambil ulang kode kelompok setelah update
            $kodeKelompok = $keluarga->kelompok->kode_kelompok;
            $codeFromKeluargas = $kodeKelompok . $request->kode_kk;

            // Ambil urutan warga di keluarga
            // Kalau no_induk sebelumnya udah mengandung urutan, kita ambil dan pakai ulang
            $nomorLama = explode('.', $warga->no_induk);
            $angkaUrut = isset($nomorLama[1]) ? $nomorLama[1] : '01';

            // Ambil dua digit bulan & tahun dari tanggal baptis
            $bulanTahunBaptis = '';
            if ($request->tanggal_baptis) {
                $bulan = date('m', strtotime($request->tanggal_baptis));
                $tahun = date('y', strtotime($request->tanggal_baptis));
                $bulanTahunBaptis = '.' . $bulan . $tahun;
            }

            // Generate ulang no_induk
            $noIndukBaru = $codeFromKeluargas . '.' . $angkaUrut . $bulanTahunBaptis;

            // Update data warga
            $warga->update([
                'no_induk' => $noIndukBaru,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'jk' => $request->jk,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_baptis' => $request->tempat_baptis,
                'tanggal_baptis' => $request->tanggal_baptis,
                'tempat_sidhi' => $request->tempat_sidhi,
                'tanggal_sidhi' => $request->tanggal_sidhi,
                'tempat_menikah' => $request->tempat_menikah,
                'tanggal_menikah' => $request->tanggal_menikah,
                'talenta_id' => $request->talenta_id,
                'pendidikan_id' => $request->pendidikan_id,
                'pekerjaan_id' => $request->pekerjaan_id,
                'status_keluarga_id' => $request->status_keluarga_id,
                'status_warga_id' => $request->status_warga_id,
                'status_nikah_id' => $request->status_nikah_id,
                'code_from_keluargas' => $codeFromKeluargas,
            ]);
        });

        return redirect()->back()->with('success', 'Data warga dan keluarga berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $warga = Warga::findOrFail($id);
            $warga->delete();
            return redirect()->back()->with('warning', 'Data berhasil dihapus!');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->back()->with('error', 'Gagal hapus! Data ini masih terhubung dengan data lain.');
            }
            throw $e;
        }
    }

    function formEditWarga($id)
    {
        $item = Warga::findOrFail($id);
        return view('data warga.updateWarga', compact('item'));
    }
    public function cetakWarga(Request $request)
    {
        $sort = $request->input('sort');
        $order = $request->input('order', 'asc'); // default asc

        $keluargas = Keluarga::all();
        $kelompoks = Kelompok::all();
        $talentas = Talenta::all();
        $pendidikans = Pendidikan::all();
        $pekerjaans = Pekerjaan::all();
        $statusKeluarga = StatusKeluarga::all();
        $statusWarga = StatusWarga::all();
        $statusNikah = StatusNikah::all();

        $query = Warga::join('status_keluargas', 'wargas.status_keluarga_id', '=', 'status_keluargas.id')
            ->orderByRaw("FIELD(status_keluargas.status_keluarga, 'KK', 'Istri', 'Anak', 'Orang Tua', 'Mertua', 'Adik', 'Keponakan', 'Kakek', 'Nenek', 'Cucu')")
            ->with([
                'keluarga',
                'talenta',
                'pendidikan',
                'pekerjaan',
                'statusKeluarga',
                'statusWarga',
                'statusNikah'
            ]);

        if (in_array($sort, ['nama', 'jk', 'tanggal_lahir'])) {
            $query->orderBy("wargas.$sort", $order);
        } else {
            $query->orderBy('wargas.nama', 'asc'); // default sorting
        }

        $data = $query->get();

        return view('data warga.cetakWarga', compact(
            'data',
            'keluargas',
            'talentas',
            'pendidikans',
            'pekerjaans',
            'statusKeluarga',
            'statusWarga',
            'statusNikah',
            'kelompoks',
        ));
    }
    public function chartData()
    {
        $totalWarga = Warga::count();
        $jumlahLaki = Warga::where('jk', 'L')->count();
        $jumlahPerempuan = Warga::where('jk', 'P')->count();

        return view('home', [
            'totalWarga' => $totalWarga,
            'jumlahLaki' => $jumlahLaki,
            'jumlahPerempuan' => $jumlahPerempuan,
        ]);
    }
}
