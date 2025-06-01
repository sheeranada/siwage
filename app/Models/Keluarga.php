<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory, HasUUID;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'keluargas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode_kk',
        'catatan',
        'kelompok_id',
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
    /**
     * Get the kelompok associated with the Keluarga
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'kelompok_id');
    }
    // Satu Keluarga punya banyak Warga
    public function wargas()
    {
        return $this->hasMany(Warga::class, 'keluarga_id', 'id');
    }
    public function getKodeKeluargaAttribute()
    {
        return optional($this->kelompok)->kode_kelompok . $this->kode_kk;
    }
}
