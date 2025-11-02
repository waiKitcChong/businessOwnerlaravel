<?php

namespace App\Http\Controllers\Supabase\BusinessOwner;

use App\Http\Controllers\Supabase\BaseSupabaseController;

class RoomController extends BaseSupabaseController
{
    protected $table = 'Room';
    protected $viewPath = 'business_owner.room';
}
