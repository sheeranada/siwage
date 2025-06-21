<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\HASUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warga extends Model
{
    use HasFactory, HASUUID;
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
        'no_kk',
        'nama',
        'alamat',
        'jk',
        'no_telp',
        'catatan',
        'tempat_lahir',
        'tanggal_lahir',
        'tempat_baptis',
        'tanggal_baptis',
        'tempat_sidhi',
        'tanggal_sidhi',
        'tempat_nikah',
        'tanggal_nikah',
        'kelompok_id',
        'pendidikan_id',
        'pekerjaan_id',
        'talenta_id',
        'status_warga_id',
        'status_nikah_id',
        'status_keluarga_id',
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
    /**
     * Get the kelompok that owns the Warga
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'kelompok_id', 'kode_kelompok');
    }
    /**
     * Get the pendidikan that owns the Warga
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan_id', 'id');
    }
    /**
     * Get the pekerjaan that owns the Warga
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id', 'id');
    }
    /**
     * Get the talenta that owns the Warga
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function talenta()
    {
        return $this->belongsTo(Talenta::class, 'talenta_id', 'id');
    }
    /**
     * Get the statusWarga that owns the Warga
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusWarga()
    {
        return $this->belongsTo(StatusWarga::class, 'status_warga_id', 'id');
    }
    /**
     * Get the statusNikah that owns the Warga
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusNikah()
    {
        return $this->belongsTo(StatusNikah::class, 'status_nikah_id', 'id');
    }
    /**
     * Get the statusKeluarga that owns the Warga
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusKeluarga()
    {
        return $this->belongsTo(StatusKeluarga::class, 'status_keluarga_id', 'id');
    }

    public function getTanggalLahirAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d-m-Y') : null;
    }

    public function getTanggalBaptisAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d-m-Y') : null;
    }

    public function getTanggalSidhiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d-m-Y') : null;
    }

    public function getTanggalNikahAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d-m-Y') : null;
    }
}
