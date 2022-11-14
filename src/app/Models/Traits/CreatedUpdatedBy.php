<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Auth;

trait CreatedUpdatedBy
{
    public static function bootCreatedUpdatedBy()
    {
        static::creating(function ($model) {
            if (!$model->isDirty('created_by')) {
                $model->created_by = Auth::id();
            }
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = Auth::id();
            }
        });

        static::updating(function ($model) {
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = Auth::id();
            }
        });
    }
}