<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login'); 
})->name('home');

Route::get('/dashboard', function () {
    $user = auth()->user();
    $tasks = $user->isAdmin() ? \App\Models\Task::all() : $user->tasks;
    $view = $user->isAdmin() ? 'admin.dashboard' : 'user.dashboard';

    // Debugging


    return view($view, ['tasks' => $tasks]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('tasks', TaskController::class)->except(['show']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Breeze authentication routes (already defined by Breeze)
require __DIR__ . '/auth.php';
