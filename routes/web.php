<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


// Homepage
// Route::get('/', function () {
//     return view('home.index');
//     // return redirect()->route('dashboard');
//     // Route::get('/home', \App\Http\Controllers\HomeController::class)->name('home');
// });

Route::get('/',[HomeController::class, 'index'])->name('home');

//Dashboard
Route::prefix('dashboard')
    // ->middleware(['auth:sanctum','admin'])
    ->group(function(){
        Route::get('/',[DashboardController::class,'index'])->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('books', BookController::class);
        Route::resource('borrows', BorrowController::class);
    });