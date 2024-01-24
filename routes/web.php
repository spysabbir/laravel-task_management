<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendController::class, 'index'])->name('index');

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard Routes
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Tasks Routes
    Route::resource('tasks', TaskController::class);
    Route::get('tasks/status/{id}', [TaskController::class, 'status'])->name('tasks.status');
    Route::get('tasks/pending/all', [TaskController::class, 'pendingAll'])->name('tasks.pending.all');
    Route::get('tasks/completed/all', [TaskController::class, 'completedAll'])->name('tasks.completed.all');
    Route::get('tasks/delete/completed', [TaskController::class, 'deleteCompleted'])->name('tasks.delete.completed');
    Route::get('tasks/delete/all', [TaskController::class, 'deleteAll'])->name('tasks.delete.all');
});

// Auth Routes
require __DIR__.'/auth.php';
