<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory;

    protected $primaryKey = 'staff_id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'department_id',
        'role',
    ];

    public function getRouteKeyName()
    {
        return 'staff_id';
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    public function account()
    {
        return $this->hasOne(Account::class, 'staff_id', 'staff_id');
    }

    public function supplyRequests()
    {
        return $this->hasMany(SupplyRequest::class, 'staff_id', 'staff_id');
    }

    public function requestLimitRules()
    {
        return $this->hasMany(RequestLimitRule::class, 'staff_id', 'staff_id');
    }

    public function requestLogs()
    {
        return $this->hasMany(RequestLog::class, 'performed_by', 'staff_id');
    }
}
