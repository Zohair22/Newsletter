<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('posts');
Route::get('posts/{post}', [PostController::class, 'show'])->name('post');

Route::POST('newsletter',NewsletterController::class)->name('newsletter');


Route::middleware('auth')->group( function () {
    Route::post('posts/{post}/comment', [PostCommentsController::class, 'store'])->name('comment');
    Route::post('logout', [SessionController::class, 'destroy'])->name('logout');
});

Route::middleware('guest')->group( function () {
    Route::get('login', [SessionController::class, 'create'])->name('loginForm');
    Route::post('login', [SessionController::class, 'login'])->name('login');
    Route::get('register', [RegisterController::class, 'create'])->name('registerForm');
    Route::post('register', [RegisterController::class, 'store'])->name('register');
});


Route::get('admin/post/create', [PostController::class, 'create'])->name('postCreate');
