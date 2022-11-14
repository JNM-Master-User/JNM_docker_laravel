<?php

namespace App\Models;

use App\Models\Traits\CreatedUpdatedBy;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory, Uuid, CreatedUpdatedBy;

    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'id_user',
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

    protected $table = 'institutions';

    public function events()
    {
        return $this->hasMany(Event::class,'id_institution_manager');
    }
    public function participationsInstitutionsTournaments()
    {
        return $this->hasMany(ParticipationInstitutionTournament::class,'id_institution');
    }
    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
