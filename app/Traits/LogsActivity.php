<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait LogsActivity
{
    protected static function bootLogsActivity()
    {
        foreach (['created', 'updated', 'deleted'] as $event) {
            static::$event(function ($model) use ($event) {
                Log::channel('activity')->info($event, [
                    'model' => class_basename($model),
                    'id' => $model->id,
                    'user_id' => auth()->id() ?? 'system'
                ]);
            });
        }
    }
}
