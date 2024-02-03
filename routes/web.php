<?php

use App\Http\Controllers\InsertController;
use App\Http\Controllers\UpdateController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', function(){
    return view('login-admin');
})->name('login');

Route::middleware(['auth'])->group(function(){
    Route::get('/booking', function () { return view('admin.main.booking'); })->name('booking');
    Route::get('/user', function () { return view('admin.main.user'); })->name('user');
    Route::get('/room', function () { return view('admin.main.roomService'); })->name('roomService');
    Route::get('/partner', function () { return view('admin.main.partner'); })->name('partner');

    Route::get('/logout',  function(){
        Auth::logout();
        return redirect(route('booking'));
    })->name('logout');

    // route update
    Route::post('/update/room/{id}', [UpdateController::class, 'UpdateRoom'])->name('UpdateRoom');

    Route::post('/update/checkin/{id}', [UpdateController::class, 'checkin'])->name('updateCheckin');
    Route::post('/update/checkout/{id}', [UpdateController::class, 'checkout'])->name('updateCheckout');
});
