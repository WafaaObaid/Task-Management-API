<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Route::resource('tasks', TaskController::class); // CRUD URLs

Route::middleware('web')->group(function () {
    // Auth URLs
    Route::get('/login', [AuthController::class, 'ShowLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'webLogin']);
    Route::get('/register', [AuthController::class, 'ShowRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'webRegister']);
});


// CRUD URLs
Route::get('/tasks', [TaskController::class, 'webIndex'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');


Route::get('/tasks/deleted', [TaskController::class, 'deleted'])
    ->name('tasks.deleted');

Route::patch('/tasks/{id}/restore', [TaskController::class, 'restore'])
    ->name('tasks.restore');
