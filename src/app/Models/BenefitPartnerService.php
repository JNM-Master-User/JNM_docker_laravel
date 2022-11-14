<?php

namespace App\Models;

use App\Models\Traits\CreatedUpdatedBy;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BenefitPartnerService extends Model
{
    use HasFactory, Uuid, CreatedUpdatedBy;

    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_partner',
        'id_service'
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

    protected $table = 'benefits_partners_services';

    public function partner()
    {
        return $this->belongsTo(Partner::class,'id_partner');
    }
    public function service()
    {
        return $this->belongsTo(Service::class,'id_service');
    }
    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
