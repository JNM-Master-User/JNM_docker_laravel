<?php

namespace App\Models;

use App\Models\Traits\CreatedUpdatedBy;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory, Uuid, CreatedUpdatedBy;

    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_pole',
        'id_role',
        'name',
        'last_name'
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

    protected $table = 'contacts';

    public function pole()
    {
        return $this->belongsTo(Pole::class,'id_pole');
    }
    public function role()
    {
        return $this->belongsTo(Role::class,'id_role');
    }
    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
