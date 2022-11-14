<?php

namespace App\Models;

use App\Models\Traits\CreatedUpdatedBy;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pole extends Model
{
    use HasFactory, Uuid, CreatedUpdatedBy;

    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
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

    protected $table = 'poles';

    public function contacts()
    {
        return $this->hasMany(Contact::class,'id_pole');
    }
    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
