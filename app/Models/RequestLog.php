<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestLog extends Model
{
    use HasFactory;

    protected $primaryKey = 'log_id';
    public $timestamps = false;
    protected $fillable = [
        'request_id',
        'action_type',
        'action_date',
        'performed_by',
    ];

    public function getRouteKeyName()
    {
        return 'log_id';
    }

    protected $casts = [
        'action_date' => 'datetime',
    ];

    public function request()
    {
        return $this->belongsTo(SupplyRequest::class, 'request_id', 'request_id');
    }

    public function performer()
    {
        return $this->belongsTo(Staff::class, 'performed_by', 'staff_id');
    }
}
