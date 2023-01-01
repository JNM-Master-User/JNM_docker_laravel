<?php

namespace App\Models;

use App\Http\Controllers\Admin\DefinitionUsersUsersStatus;
use App\Models\Traits\CreatedUpdatedBy;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Traits\Uuid;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Uuid;

    protected $keyType = 'string';

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

    public static function EnsureIsAdmin(): bool
    {
        foreach (Auth::user()->definitionsUsersUsersStatus->load('userStatus') as $definitionUserUsersStatus){
            if ($definitionUserUsersStatus->userStatus->type == 'admin') return true;
        }
        return false;
    }
    // user has one
    public function userSensitiveData()
    {
        return $this->hasOne(UserSensitiveData::class,'id_user');
    }
    public function subscriptionUserNavigo()
    {
        return $this->hasOne(SubscriptionUserNavigo::class,'id_user');
    }

    //user has many
    public function definitionsUsersUsersStatus()
    {
        return $this->hasMany(DefinitionUserUserStatus::class,'id_user');
    }
    public function bookingsUsersEvents()
    {
        return $this->hasMany(BookingUserEvent::class,'id_user');
    }
    public function allotmentsCreations()
    {
        return $this->hasMany(Allotment::class,'created_by');
    }
    public function contactsCreations()
    {
        return $this->hasMany(Contact::class,'created_by');
    }
}
