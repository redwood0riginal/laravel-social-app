<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('content.home');
})->middleware('mustBeLogedIn')->name('home');

// following feed related routes
Route::get('/following', [PostController::class, 'followigIndex'])->middleware('mustBeLogedIn')->name('home.following');

// user related routes
Route::get('/register-form', [UserController::class, 'registerForm']);
Route::get('/login-form', [UserController::class, 'loginForm']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('mustBeLogedIn')->name('logout');

// post related routes
Route::post('/create-post', [PostController::class, 'store'])->middleware('mustBeLogedIn');
Route::get('/', [PostController::class, 'index'])->middleware('mustBeLogedIn')->name('home');
Route::get('/posts/{post}', [PostController::class, 'show'])->middleware('mustBeLogedIn')->name('posts.show');
Route::delete('/delete-post/{post}', [PostController::class, 'destroy'])->middleware('mustBeLogedIn')->name('post.delete');

// profile related routes
Route::get('/profile/{user}', [UserController::class, 'showProfile'])->name('profile')->middleware('mustBeLogedIn')->name('profile.show');
Route::get('/profile-form/{user}/edit', [UserController::class, 'showProfileForm'])->middleware('mustBeLogedIn')->name('profile.edit');
Route::put('/profile/{user}', [UserController::class, 'update'])->name('profile.update')->middleware('mustBeLogedIn');

// follow related routes
Route::post('users/{user}/follow',[FollowerController::class, 'follow'])->middleware('mustBeLogedIn')->name('user.follow');
Route::post('users/{user}/unfollow',[FollowerController::class, 'unfollow'])->middleware('mustBeLogedIn')->name('user.unfollow');

// comments related routes
Route::post('posts/{post}/comments',[CommentController::class, 'store'])->middleware('mustBeLogedIn')->name('posts.comment.store');

// likes related routes

Route::post('/like',[PostController::class, 'like'])->middleware('mustBeLogedIn')->name('posts.like');
