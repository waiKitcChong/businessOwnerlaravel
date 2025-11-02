<?php

namespace App\Http\Controllers\Supabase\BusinessOwner;

use App\Http\Controllers\Supabase\BaseSupabaseController;
use Illuminate\Http\Request;

class StaffController extends BaseSupabaseController
{
    protected $table = 'Bussiness_Staff';

    public function getOwnerDetails()
    {
        $userId = session('user_id');

        $result = $this->getTableData('Bussiness_Owner', ['user_id' => 'eq.' . $userId]);


        return $result;
    }

    public function index()
    {
        $ownerId = $this->getOwnerDetails()[0]['owner_id'];
        $staffs = $this->getTableData($this->table, ['owner_id' => 'eq.' . $ownerId], 'staff_id,contact_number,department,country, address,user_id,owner_id,registration_date,User(*)');
        return view('business_owner.staff', compact('staffs', 'ownerId'));
    }
public function store(Request $request)
{
    $validated = $request->validate([
        'staff_name'     => 'required|string|max:100',
        'email'          => 'required|email',
        'contact_number' => 'required|string|regex:/^01[0-9]-[0-9]{7,8}$/',
        'IC'             => 'required|string|regex:/^[0-9]{12}$/',
        'country'        => 'required|string|max:50',
        'address'        => 'required|string|max:255',
        'department'     => 'required|string|max:50',
    ]);

    try {
        $ownerDetails = $this->getOwnerDetails();
        $owner_id = $ownerDetails[0]['owner_id'] ?? null;
        if (!$owner_id) {
            return redirect()->back()->with('error', 'Owner ID not found.');
        }

        $users = $this->supabase->get('User', [], 'user_id');
        $latestUser = collect($users)->sortByDesc('user_id')->first();
        $newNum = $latestUser ? str_pad(intval(substr($latestUser['user_id'], 2)) + 1, 3, '0', STR_PAD_LEFT) : '001';
        $newUserId = 'UU' . $newNum;

        $userData = [
            'user_id'  => $newUserId,
            'name'     => $validated['staff_name'],
            'email'    => $validated['email'],
            'role'     => 'staff',
            'status'   => 'active',          
            'password' => bcrypt('defaultpassword'),
            'created_at' => now(),
            
        ];
        $userResponse = $this->supabase->insert('User', $userData);

        if (isset($userResponse['error'])) {
            throw new \Exception($userResponse['error']['message']);
        }

        $ownerCode = str_pad(substr($owner_id, -3), 3, '0', STR_PAD_LEFT);
        $staffCount = $this->supabase->get('Bussiness_Staff', ['owner_id' => 'eq.' . $owner_id]);
        $countForOwner = is_array($staffCount) ? count($staffCount) + 1 : 1;
        $staffSeq = str_pad($countForOwner, 2, '0', STR_PAD_LEFT);
        $staffId = "BFS{$ownerCode}{$staffSeq}";

        $staffData = [
            'staff_id'       => $staffId,
            'user_id'        => $newUserId,
            'owner_id'       => $owner_id,
            'contact_number' => $validated['contact_number'],
            'department'     => $validated['department'],
            'IC'             => $validated['IC'],
            'country'        => $validated['country'],
            'address'        => $validated['address'],
            'registration_date' => now(),
        ];
        $staffResponse = $this->supabase->insert('Bussiness_Staff', $staffData);

        if (isset($staffResponse['error'])) {
            throw new \Exception($staffResponse['error']['message']);
        }

        return redirect()->back()->with('success', " Staff {$staffId} added successfully!");

    } catch (\Exception $e) {
        return redirect()->back()->with('error', ' Error: ' . $e->getMessage());
    }
}

    public function update(Request $request, $staffId)
    {
        $data = $request->only(['contact_number', 'department', 'address']);
        $this->updateRecord($this->table, ['staff_id' => $staffId], $data);
        return redirect()->back()->with('success', 'Staff updated successfully.');
    }

    public function destroy($staffId)
    {
        $this->deleteRecord($this->table, ['staff_id' => $staffId]);
        return redirect()->back()->with('success', 'Staff deleted successfully.');
    }
}
