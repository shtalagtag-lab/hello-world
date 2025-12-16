<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestLimitRule extends Model
{
    use HasFactory;

    protected $primaryKey = 'rule_id';
    public $timestamps = false;
    protected $fillable = [
        'department_id',
        'staff_id',
        'item_id',
        'limit_quantity',
        'rule_type',
    ];

    public function getRouteKeyName()
    {
        return 'rule_id';
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'staff_id');
    }

    public function item()
    {
        return $this->belongsTo(SupplyItem::class, 'item_id', 'item_id');
    }
}
