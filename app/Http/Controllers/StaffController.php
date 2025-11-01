<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\BussinessStaff;

class StaffController extends Controller
{

    public function getOwnerId()
    {
        $ownerController = new OwnerController();
        $owner = $ownerController->getOwnerDetails();
        $ownerId = $owner->owner_id;
        return $ownerId;
    }


    public function staff()
    {

        $staffs = BussinessStaff::with(['user', 'owner'])
            ->where('owner_id', $this->getOwnerId())
            ->get();

        return view('business_owner.staff', compact('staffs'));
    }


    public function store(Request $request)
    {
        // 🟡 Validate input
        $validated = $request->validate([
            'staff_name' => 'required|string|max:100',
            'contact_number' => 'required|string|regex:/^01[0-9]-[0-9]{7,8}$/',
            'IC' => 'required|string|regex:/^[0-9]{12}$/',
            'country' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'department' => 'required|string|max:50',
            'email' => 'required|email|unique:User,email',
        ]);

        // 🟢 Step 1: Auto-generate user_id (format: UU + 3 digits)
        $latestUser = User::orderBy('user_id', 'desc')->first();
        if ($latestUser) {
            $lastNum = intval(substr($latestUser->user_id, 2)); // remove 'UU'
            $newNum = str_pad($lastNum + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newNum = '001';
        }
        $newUserId = 'UU' . $newNum;

        // 🟢 Step 2: Get owner_id from session
        $owner_id =  $this->getOwnerId();

        // 🟢 Step 3: Create User first
        $user = User::create([
            'user_id' => $newUserId,
            'name' => $request->staff_name,
            'email' => $request->email,
            'role' => 'staff',
            'status' => 'active',
            'password' => bcrypt('defaultpassword'), // Set a default password or generate one
        ]);

        // 🟢 Step 4: Auto-generate staff_id
        $ownerCode = str_pad(substr($owner_id, -3), 3, '0', STR_PAD_LEFT); // last 3 digits
        $countForOwner = BussinessStaff::where('owner_id', $owner_id)->count() + 1;
        $staffSeq = str_pad($countForOwner, 2, '0', STR_PAD_LEFT);
        $staffId = "BFS{$ownerCode}{$staffSeq}";

        // 🟢 Step 5: Create Bussiness Staff record
        BussinessStaff::create([
            'staff_id' => $staffId,
            'contact_number' => $request->contact_number,
            'department' => $request->department,
            'IC' => $request->IC,
            'country' => $request->country,
            'address' => $request->address,
            'user_id' => $newUserId,
            'owner_id' => $owner_id,
        ]);

        return redirect()->back()->with('success', "Staff {$staffId} added successfully!");
    }


    // Update existing staff
    public function update(Request $request, $id)
    {
        $staff = BussinessStaff::find($id);

        if ($staff) {
            $staff->update([
                'staff_name' => $request->staff_name,
                'position' => $request->position,
            ]);
        }

        return redirect()->back()->with('success', 'Staff updated successfully!');
    }
}
