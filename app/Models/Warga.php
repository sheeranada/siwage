<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory, HasUUID;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wargas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_induk',
        'nama',
        'alamat',
        'telp',
        'jk',
        'tempat_lahir',
        'tanggal_lahir',
        'tempat_baptis',
        'tanggal_baptis',
        'tempat_sidhi',
        'tanggal_sidhi',
        'tempat_menikah',
        'tanggal_menikah',
        'keluarga_id',
        'talenta_id',
        'pendidikan_id',
        'pekerjaan_id',
        'status_keluarga_id',
        'status_warga_id',
        'status_nikah_id',
        'code_from_keluargas'
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    // relasi
    // Relasi ke Keluarga (Warga belongsTo Keluarga)
    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class);
    }

    // Relasi ke Talenta (Warga belongsTo Talenta)
    public function talenta()
    {
        return $this->belongsTo(Talenta::class);
    }

    // Relasi ke Pendidikan (Warga belongsTo Pendidikan)
    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class);
    }

    // Relasi ke Pekerjaan (Warga belongsTo Pekerjaan)
    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class);
    }

    // Relasi ke StatusKeluarga (Warga belongsTo StatusKeluarga)
    public function statusKeluarga()
    {
        return $this->belongsTo(StatusKeluarga::class);
    }

    // Relasi ke StatusWarga (Warga belongsTo StatusWarga)
    public function statusWarga()
    {
        return $this->belongsTo(StatusWarga::class);
    }
    public function statusNikah()
    {
        return $this->belongsTo(StatusNikah::class, 'status_nikah_id');
    }
}
