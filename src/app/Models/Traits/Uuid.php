<?php

namespace App\Models\Traits;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Ramsey\Uuid\Uuid as RamseyUuid;

trait Uuid
{
    public static function boot(){
        parent::boot();
        static::creating(function($model) {
            $model->id = RamseyUuid::uuid4()->toString();
        });
    }
}
