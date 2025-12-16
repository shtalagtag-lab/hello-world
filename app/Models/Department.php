<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $primaryKey = 'department_id';
    public $timestamps = false;
    protected $fillable = [
        'department_name',
    ];

    public function getRouteKeyName()
    {
        return 'department_id';
    }

    public function staff()
    {
        return $this->hasMany(Staff::class, 'department_id', 'department_id');
    }

    public function requestLimitRules()
    {
        return $this->hasMany(RequestLimitRule::class, 'department_id', 'department_id');
    }
}
