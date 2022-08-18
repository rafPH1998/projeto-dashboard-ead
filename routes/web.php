<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function() {
    
    Route::resource('/users', UserController::class);


    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
});
