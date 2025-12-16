<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class account extends Model
{
    public function getAcc() {
        return DB::select('Select * From requeststatus');
    }

    public function createAcc($Name) {
        return DB::insert('Insert Into requeststatus (Name) Values (?)', [$Name]);
    }

    public function editAcc($status_id) {
        return DB::select('Select * From requeststatus Where status_id = ?', [$ClientID]);
    }

    public function updateAcc($status_id, $Name) {
        return DB::update('Update requeststatus Set Name = ? where status_id = ?',[$Name, $status_id]);
    }

    public function destroyAcc($ClientID) {
        return DB::delete('Delete From requeststatus Where status_id = ?', [$status_id]);
    }
}