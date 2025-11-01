<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'User';
    public $timestamps = true;


    protected $fillable = [
        'user_id',
        'name',
        'email',
        'role',
        'status',
        'password'
    ];

    // 1 User id has one Staff id
    public function staff()
    {
        return $this->hasOne(BussinessStaff::class, 'user_id', 'user_id');
    }

    public function owner()
    {
        return $this->hasOne(BussinessOwner::class, 'owner_id', 'user_id');
    }
  
}
