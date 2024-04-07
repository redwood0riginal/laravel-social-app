<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('home');
})->middleware('mustBeLogedIn');


// user related routes
Route::get('/register-form', [UserController::class, 'registerForm']);
Route::get('/login-form', [UserController::class, 'loginForm']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// post related routes
Route::post('/create-post', [PostController::class, 'store']);
Route::get('/', [PostController::class, 'index'])->middleware('mustBeLogedIn');
