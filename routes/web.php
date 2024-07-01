<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;


//login routes

Route::get('/', [App\Http\Controllers\ApiAuthController::class, 'showLoginForm'])->name('login');

//home route
Route::middleware('auth.sanctum.session')->group(function () {
    Route::get('dashboard', [HomeController::class, 'home'])->name('dashboard');
    Route::get('boards', [BoardController::class, 'index'])->name('boards');
    Route::get('add-boards', [BoardController::class, 'addBoard'])->name('add-boards');
});


//task route
Route::get('add-task', [TaskController::class, 'addtask'])->name('add.task');
