<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'detail_id';
    public $timestamps = false;
    protected $fillable = [
        'request_id',
        'item_id',
        'quantity_requested',
        'quantity_issued',
    ];

    public function getRouteKeyName()
    {
        return 'detail_id';
    }

    public function request()
    {
        return $this->belongsTo(SupplyRequest::class, 'request_id', 'request_id');
    }

    public function item()
    {
        return $this->belongsTo(SupplyItem::class, 'item_id', 'item_id');
    }
}
