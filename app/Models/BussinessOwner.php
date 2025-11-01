<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BussinessOwner extends Model
{
    protected $table = 'Bussiness_Owner';
    public $timestamps = false;

     
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function staff()
    {
        return $this->hasMany(BussinessStaff::class, 'owner_id', 'owner_id');
    }
  
}
