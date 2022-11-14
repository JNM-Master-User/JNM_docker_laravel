<?php

namespace App\Models;

use App\Models\Traits\CreatedUpdatedBy;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    use HasFactory, Uuid, CreatedUpdatedBy;

    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type'
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string',
    ];
    public $incrementing = false;

    protected $table = 'users_status';

    //a user_status has many users tuple linked by 'id_user_status' attribute
    public function users()
    {
        return $this->hasMany(User::class,'id_user_status');
    }
    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
