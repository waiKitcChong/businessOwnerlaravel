<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

use App\Http\Controllers\Supabase\BusinessOwner\{
    DashboardController as OwnerDashboard,
    RoomController as OwnerRoom,
    LocationController as OwnerLocation,
    PromotionController as OwnerPromotion,
    StaffController as OwnerStaff
};

use App\Http\Controllers\Supabase\Staff\{
    DashboardController as StaffDashboard,
    RoomController as StaffRoom,
    LocationController as StaffLocation,
    PromotionController as StaffPromotion
};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group.
|
*/
Route::get('/', [IndexController::class, 'index'])->name('index');

Route::post('/setSession', function (Request $request) {
    session([
        'user_id' => $request->input('user_id'),
        'role' => $request->input('role'),
        'name' => $request->input('name')
    ]);
    return response()->json(['success' => true]);
})->name('setSession');

Route::get('auth/login', function () {
    return view('auth.login'); 
});

Route::prefix('/business_owner')->group(function () {

    Route::get('/dashboard', function () {
        return view('business_owner.dashboard');
    })->middleware('role:owner');

    Route::get('/location', function () {
        return view('business_owner.location');
    })->middleware('role:owner');

    Route::get('/promotion', function () {
        return view('business_owner.promotion');
    })->middleware('role:owner');

    Route::get('/room', function () {
        return view('business_owner.room');
    })->middleware('role:owner');

    Route::get('/staff', [OwnerStaff::class, 'index'])->middleware('role:owner');
    Route::post('/staff/store', [OwnerStaff::class, 'store'])->middleware('role:owner');

        
});


Route::prefix('/staff')->group(function () {

    Route::get('/dashboard', function () {
        return view('staff.dashboard');
    })->middleware('role:staff');

 

});


Route::get('/logout', function () {
    session()->flush(); // Clear session
    return redirect(url('auth/login'));
});

