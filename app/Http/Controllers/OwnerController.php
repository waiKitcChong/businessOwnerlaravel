<?php

namespace App\Http\Controllers;

use App\Models\BussinessOwner;

class OwnerController extends Controller
{


    public function getOwnerDetails()
    {  
        $getOwner = BussinessOwner::with(['user'])
        ->where('user_id', session('user_id'))
        ->first();

        return $getOwner;
    }

}
