<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Login view
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Register view
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// API routes for AJAX requests
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
