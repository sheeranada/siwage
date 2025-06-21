<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKeluarga extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'status_keluargas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status_keluarga'];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
    /**
     * Get all of the warga for the StatusKeluarga
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function warga()
    {
        return $this->hasMany(Warga::class);
    }
}
