<?php

namespace App\Models;

use App\Models\Traits\CreatedUpdatedBy;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefinitionUserUserStatus extends Model
{
    use HasFactory, Uuid, CreatedUpdatedBy;

    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user',
        'id_user_status',
        'created_by',
        'updated_by'
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

    protected $table = 'definitions_users_users_status';

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
    public function userStatus()
    {
        return $this->belongsTo(UserStatus::class,'id_user_status');
    }
    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
