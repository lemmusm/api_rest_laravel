<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'uid';
    public $incrementing = false;
    // protected $finduid = 'uid';

    public function tickets() {
        return $this->hasMany(Tickets::class, 'user_id', 'uid');
    }
    public function dpto() {
        return $this->belongsTo(Dptos::class, 'dpto_id', 'id'); 
    }
}
