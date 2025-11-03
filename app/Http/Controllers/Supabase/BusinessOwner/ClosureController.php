<?php

namespace App\Http\Controllers\Supabase\BusinessOwner;

use App\Http\Controllers\Supabase\BaseSupabaseController;

use Illuminate\Http\Request;

class ClosureController extends BaseSupabaseController      
{
    public function index()
    {
        return view('business_owner.schedule'); // Blade view with your calendar
    }

    public function getClosures()
    {
        // Example: could come from DB
        $closures = [
            "2025-12-24",
            "2025-12-25",
            "2025-12-26",
            "2025-12-31",
            "2026-01-01",
        ];

        return response()->json($closures);
    }
}

