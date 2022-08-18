<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function() {
    
    /**
     * Routes Users
     */
    Route::resource('/users', UserController::class);


    /**
     * Routes Courses
     */
    Route::resource('/courses', CourseController::class);


     /**
     * Routes Admins
     */
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
});
