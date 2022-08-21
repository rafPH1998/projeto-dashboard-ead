<?php

use App\Http\Controllers\{
    AdminController,
    UserController,
    CourseController,
    ModuleController
};

use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function() {
    
    /**
     * Routes Users
     */
    Route::resource('/users', UserController::class);


    /**
     * Routes Courses
     */
    Route::resource('/courses', CourseController::class)->except('show');

    /**
     * Routes Modules
     */
    Route::resource('/courses/{id}/modules', ModuleController::class);

     /**
     * Routes Admins
     */
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
});
