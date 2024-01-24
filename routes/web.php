<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Tasks Routes
Route::resource('tasks', TaskController::class);
Route::get('tasks/status/{id}', [TaskController::class, 'status'])->name('tasks.status');
Route::get('tasks/pending/all', [TaskController::class, 'pendingAll'])->name('tasks.pending.all');
Route::get('tasks/completed/all', [TaskController::class, 'completedAll'])->name('tasks.completed.all');
Route::get('tasks/delete/completed', [TaskController::class, 'deleteCompleted'])->name('tasks.delete.completed');
Route::get('tasks/delete/all', [TaskController::class, 'deleteAll'])->name('tasks.delete.all');

require __DIR__.'/auth.php';
