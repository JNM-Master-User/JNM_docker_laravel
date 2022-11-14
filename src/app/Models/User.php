<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Traits\Uuid;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Uuid;

    const DEFAULT_USER_STATUS_ = "etudiant";
    protected $keyType = 'string';

    protected $attributes = [
        'id_user_status' => self::DEFAULT_USER_STATUS_,
        ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string',
        'email_verified_at' => 'datetime',
    ];
    public $incrementing = false;

    protected $table = 'users';

    //a user belongs to §§
    public function userStatus()
    {
        return $this->belongsTo(UserStatus::class);
    }

    //a user has §§ tuple linked by 'id_user' attribute
    public function bookingsUsersEvents()
    {
        return $this->hasMany(BookingUserEvent::class,'id_user');
    }
    public function userSensitiveData()
    {
        return $this->hasOne(UserSensitiveData::class,'id_user');
    }
    public function subscriptionUserNavigo()
    {
        return $this->hasOne(SubscriptionUserNavigo::class,'id_user');
    }
    public function allotment()
    {
            return $this->hasOne(Allotment::class,'id_user');
    }
    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
