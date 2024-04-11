<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('layouts.layout');
})->middleware('mustBeLogedIn')->name('home');


// user related routes
Route::get('/register-form', [UserController::class, 'registerForm']);
Route::get('/login-form', [UserController::class, 'loginForm']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// post related routes
Route::post('/create-post', [PostController::class, 'store']);
Route::get('/', [PostController::class, 'index'])->middleware('mustBeLogedIn')->name('home');

// profile related routes
Route::get('/profile/{user}', [UserController::class, 'showProfile'])->name('profile')->middleware('mustBeLogedIn');
Route::get('/profile-form/{user}/edit', [UserController::class, 'showProfileForm'])->middleware('mustBeLogedIn')->name('profile.edit');
Route::put('/profile/{user}', [UserController::class, 'update'])->name('profile.update')->middleware('mustBeLogedIn');

