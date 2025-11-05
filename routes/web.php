<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

use App\Http\Controllers\Supabase\BusinessOwner\{
    DashboardController as OwnerDashboard,
    RoomController as OwnerRoom,
    ClosureController as ClosureController,
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

    Route::get('/dashboards', [OwnerDashboard::class, 'getOwnerDetails'])->middleware('role:owner');

    Route::get('/location', function () {
        return view('business_owner.location');
    })->middleware('role:owner');

    Route::get('/promotion', function () {
        return view('business_owner.promotion');
    })->middleware('role:owner');

    Route::get('/room', function () {
        return view('business_owner.room');
    })->middleware('role:owner');

    Route::get('/schedule', [ClosureController::class, 'index'])->middleware('role:owner');
    Route::get('/rooms_id', [ClosureController::class, 'getRooms'])->middleware('role:owner');
    Route::get('/closures', [ClosureController::class, 'getClosures'])->middleware('role:owner');
    Route::post('/closures/add', [ClosureController::class, 'addClosure'])->middleware('role:owner')->name('closures.add');
    Route::delete('/schedule/delete/{id}', [ClosureController::class, 'destroy'])->middleware('role:owner')->name('schedule.delete');


    Route::get('/staff', [OwnerStaff::class, 'index'])->middleware('role:owner');
    Route::post('/staff/store', [OwnerStaff::class, 'store'])->middleware('role:owner');
    Route::get('/staff/{staffId}', [OwnerStaff::class, 'show'])->middleware('role:owner');
    Route::post('/staff/update/{staffId}', [OwnerStaff::class, 'update'])->middleware('role:owner');
    
    Route::get('/room', [OwnerRoom::class, 'index'])->middleware('role:owner');
    Route::post('/room/store', [OwnerRoom::class, 'store'])->middleware('role:owner');
    Route::get('/room/{roomNo}/edit', [OwnerRoom::class, 'edit'])->middleware('role:owner')->name('owner.room.edit');;
    Route::post('/room/{roomNo}/update', [OwnerRoom::class, 'updateRoom'])->middleware('role:owner')->name('owner.room.update');;
});

Route::prefix('/staff')->group(function () {

    Route::get('/dashboard', function () {
        return view('staff.dashboard');
    })->middleware('role:staff');
});

Route::get('/logout', function () {
    session()->flush();
    return redirect(url('auth/login'));
});
