<?php

namespace App\Models;

use App\Models\Traits\CreatedUpdatedBy;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, Uuid, CreatedUpdatedBy;

    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_event_belong',
        'id_institution_manager',
        'name',
        'address',
        'date',
        'path_picture',
        'desc'
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

    protected $table = 'events';

    public function bookingsUsersEvents()
    {
        return $this->hasMany(BookingUserEvent::class,'id_event');
    }
    public function eventBelong()
    {
        return $this->belongsTo(Event::class,'id_event_belong');
    }
    public function institutionManager()
    {
        return $this->belongsTo(Institution::class,'id_institution_manager');
    }
    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
