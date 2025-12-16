<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;

    protected $primaryKey = 'account_id';
    public $timestamps = false;
    protected $fillable = [
        'staff_id',
        'user_name',
        'password',
    ];

    public function getRouteKeyName()
    {
        return 'account_id';
    }

    protected $hidden = ['password'];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'staff_id');
    }
}
