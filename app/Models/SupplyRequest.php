<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplyRequest extends Model
{
    use HasFactory;

    protected $primaryKey = 'request_id';
    public $timestamps = false;
    protected $fillable = [
        'request_date',
        'purpose',
        'status_id',
    ];

    public function getRouteKeyName()
    {
        return 'request_id';
    }

    protected $casts = [
        'request_date' => 'date',
    ];

    public function staff()
    {
        return $this->belongsToMany(Staff::class, 'request_staff', 'request_id', 'staff_id')->withTimestamps();
    }

    public function status()
    {
        return $this->belongsTo(RequestStatus::class, 'status_id', 'status_id');
    }

    public function details()
    {
        return $this->hasMany(RequestDetail::class, 'request_id', 'request_id');
    }

    public function logs()
    {
        return $this->hasMany(RequestLog::class, 'request_id', 'request_id');
    }
}
