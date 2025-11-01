<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BussinessStaff extends Model
{
    protected $table = 'Bussiness_Staff';
    public $timestamps = false;

      protected $fillable = [
        'staff_id',
        'contact_number',
        'department',
        'IC',
        'country',
        'address',
        'user_id',
        'owner_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function owner()
    {
        return $this->belongsTo(BussinessOwner::class, 'owner_id', 'owner_id');
    }
  
}
