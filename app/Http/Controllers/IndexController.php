<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
     
        $userId = session('user_id');
        $role = session('role');

        if (!$userId || !$role) {
            return redirect(url('auth/login'));
        }

        switch ($role) {
            case 'owner':
                return redirect('business_owner/dashboards');
            case 'staff':
                return redirect('staff/dashboard');
            default:
                return redirect('logout');
        }
    }
}
