<?php

namespace App\Models;

use App\Models\Traits\CreatedUpdatedBy;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionUserNavigo extends Model
{
    use HasFactory, Uuid, CreatedUpdatedBy;

    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'card_id',
        'id_navigo',
        'id_user'
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

    protected $table = 'subscriptions_users_navigos';

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
    public function navigo()
    {
        return $this->belongsTo(Navigo::class,'id_navigo');
    }
    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
