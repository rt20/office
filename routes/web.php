<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Homepage
Route::get('/', function () {
    return redirect()->route('dashboard');
});

//Dashboard
Route::prefix('dashboard')
    ->middleware(['auth:sanctum','admin'])
    ->group(function(){
        Route::get('/',[DashboardController::class,'index'])->name('dashboard');
        Route::resource('users', UserController::class);
    });


