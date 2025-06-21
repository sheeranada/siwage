<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusNikah extends Model
{
    use HasFactory;
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
     * Get all of the warga for the StatusNikah
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function warga()
    {
        return $this->hasMany(Warga::class);
    }
}
