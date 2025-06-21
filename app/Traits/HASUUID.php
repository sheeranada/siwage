<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HASUUID
{
    /**
     * Boot function to assign UUID when creating the model.
     */
    protected static function bootHASUUID()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * Set the incrementing to false.
     */
    public function getIncrementing(): bool
    {
        return false;
    }

    /**
     * Set the key type to string.
     */
    public function getKeyType(): string
    {
        return 'string';
    }
}
