<?php

namespace App\Http\Controllers\Supabase\Staff;

use App\Http\Controllers\Supabase\BaseSupabaseController;

class RoomController extends BaseSupabaseController
{
    protected $table = 'Room';
    protected $viewPath = 'staff.room';
}
