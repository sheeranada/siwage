<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUUID
{
    /**
     * Boot function untuk model yang menggunakan trait ini.
     */
    protected static function bootHasUUID()
    {
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * Override metode getIncrementing agar Laravel tahu bahwa ID bukan auto-increment.
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Override metode getKeyType agar Laravel tahu bahwa ID berupa string, bukan integer.
     */
    public function getKeyType()
    {
        return 'string';
    }
}
