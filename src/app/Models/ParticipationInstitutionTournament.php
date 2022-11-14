<?php

namespace App\Models;

use App\Models\Traits\CreatedUpdatedBy;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipationInstitutionTournament extends Model
{
    use HasFactory, Uuid, CreatedUpdatedBy;

    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_institution',
        'id_tournament'
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

    protected $table = 'participations_institutions_tournaments';

    public function institution()
    {
        return $this->belongsTo(Institution::class,'id_institution');
    }
    public function tournament()
    {
        return $this->belongsTo(Tournament::class,'id_tournament');
    }
    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
