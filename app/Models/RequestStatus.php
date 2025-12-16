<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestStatus extends Model
{
    use HasFactory;

    protected $primaryKey = 'status_id';
    public $timestamps = false;
    protected $fillable = [
        'status_name',
    ];

    public function getRouteKeyName()
    {
        return 'status_id';
    }

    public function supplyRequests()
    {
        return $this->hasMany(SupplyRequest::class, 'status_id', 'status_id');
    }
}
