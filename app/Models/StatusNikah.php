<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusNikah extends Model
{
    use HasFactory, HasUUID;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'status_nikahs';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status_nikah'];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
    /**
     * Get the warga that owns the StatusNikah
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}