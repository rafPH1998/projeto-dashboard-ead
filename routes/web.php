<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\{
    UserController,
    CourseController,
    ModuleController,
    LessonController,
    SupportController,
    ReplySupportController
};

use Illuminate\Support\Facades\Route;

Route::prefix('/admin')
    ->middleware(['auth'])
    ->group(function() {
    
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
     * Routes Lessons
     */

    Route::resource('/modules/{modules}/lessons', LessonController::class);

    /**
     * Routes Supports
     */
    Route::resource('/supports', SupportController::class);

     /**
     * Routes ReplySupports
     */
    Route::post('/supports/{id}/reply', [ReplySupportController::class, 'store'])->name('replies.store');

     /**
     * Routes Admins
     */
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/{admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/{admin}/edit', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/{admin}/destroy', [AdminController::class, 'destroy'])->name('admin.destroy');
});

require __DIR__.'/auth.php';
