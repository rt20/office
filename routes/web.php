<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\QmsController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, 'index'])->name('home');

//Dashboard
Route::prefix('/dashboard')
    ->middleware(['auth:sanctum'])
    ->group(function(){
        Route::get('/',[DashboardController::class,'index'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::resource('/users', UserController::class);
        Route::resource('/books', BookController::class);


        Route::get('/borrows/{id}/set-status', 'App\Http\Controllers\BorrowController@setStatus')->name('borrow.status');
        Route::resource('/borrows', BorrowController::class);
        Route::resource('/items', ItemController::class);
        Route::resource('/schedules', ScheduleController::class);
        Route::resource('/mutasi', MutasiController::class);
        Route::resource('/qms', QmsController::class);
        Route::get('/champ', 'App\Http\Controllers\QmsController@champ')->name('qms.champ');
        Route::get('/addmutasi', 'App\Http\Controllers\MutasiController@addmutasi')->name('mutasi.addmutasi');
        Route::post('/storeAddMutasi', 'MutasiController@storeAddMutasi')->name('mutasi.storeAddMutasi');
        
        Route::post('/item/import', [ItemController::class,'import'])->name('item.import');  
    });

  
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
