<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dpto extends Model
{
    protected $table = 'dptos';

    public function users() {
       return $this->hasMany(Users::class, 'dpto_id', 'uid');
    }
}
