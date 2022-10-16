<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\{
    UserController,
    CourseController,
    DashboardController,
    ModuleController,
    LessonController,
    SupportController,
    ReplySupportController
};
use App\Http\Controllers\Auth\AuthGithubController;
use App\Http\Controllers\Auth\AuthGoogleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login/google/redirect', [AuthGoogleController::class, 'loginGoogle'])->name('login.google');
Route::get('auth/google/callback', [AuthGoogleController::class, 'authGoogle']);

Route::get('login/github/redirect', [AuthGithubController::class, 'loginGithub'])->name('login.github');
Route::get('auth/github/callback', [AuthGithubController::class, 'authGithub']);

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

    Route::resource('/modules/{modules}/lessons', LessonController::class)->except('show', 'update', 'destroy');

    /**
     * Routes Supports
     */
    Route::resource('/supports', SupportController::class);

     /**
     * Routes ReplySupports
     */
    Route::post('/supports/{id}/reply', [ReplySupportController::class, 'store'])->name('replies.store');

    /**
     * Routes Dashboard Home
     */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

     /**
     * Routes Admins
     */
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/{admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/{admin}/edit', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/{admin}/destroy', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/myCount', [AdminController::class, 'myAccount'])->name('admin.myAccount');
    Route::put('/myCount', [AdminController::class, 'confiMyAccount'])->name('admin.confiMyAccount');
});

require __DIR__.'/auth.php';
