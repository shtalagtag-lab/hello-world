<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplyItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'item_id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'category',
        'quantity_in_stock',
    ];

    public function getRouteKeyName()
    {
        return 'item_id';
    }

    public function requestDetails()
    {
        return $this->hasMany(RequestDetail::class, 'item_id', 'item_id');
    }

    public function requestLimitRules()
    {
        return $this->hasMany(RequestLimitRule::class, 'item_id', 'item_id');
    }
}
