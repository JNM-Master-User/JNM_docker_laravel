<?php

namespace App\Models;

use App\Models\Traits\CreatedUpdatedBy;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingUserEvent extends Model
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
        'id_event'
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

    protected $table = 'bookings_users_events';

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
    public function event()
    {
        return $this->belongsTo(Event::class,'id_event');
    }
    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
