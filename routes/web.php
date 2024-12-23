<?php

use App\Http\Controllers\CarTypeController;
use App\Http\Controllers\DeTableController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes([
    'login'    => true,
    'logout'   => true,
    'register' => false,
    'reset'    => true,  // for resetting passwords
    'confirm'  => false, // for additional password confirmations
    'verify'   => true, // for email verification
]);

Route::middleware('auth')->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::middleware('role:admin')->group(function(){
        Route::prefix('admin')->group(function(){
            Route::resource('user',UserController::class);
            Route::put('user/ubah-password/{id}',[UserController::class,'ubahPassword']);
            Route::resource('car-type',CarTypeController::class);
            Route::resource('machine',MachineController::class);
            Route::resource('line',LineController::class);
        });
    });
    Route::middleware('role:supplier')->group(function(){
        Route::prefix('supplier')->group(function(){
            Route::resource('tabel-de',DeTableController::class);
        });
    });
    // Data Table
    Route::get('car-api',[CarTypeController::class,'api'])->name('car_api');
    Route::get('machine-api',[MachineController::class,'api'])->name('machine_api');
    Route::get('line-api',[LineController::class,'api'])->name('line_api');
    Route::get('user-api',[UserController::class,'api'])->name('user_api');
    Route::get('tabel-de',[DeTableController::class,'api'])->name('table_de');
});
