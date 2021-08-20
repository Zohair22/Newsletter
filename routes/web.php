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
    Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin')->name('postCreate');
    Route::post('admin/posts', [PostController::class, 'store'])->middleware('admin')->name('postStore');
    Route::post('posts/{post}/comment', [PostCommentsController::class, 'store'])->name('comment');
    Route::post('logout', [SessionController::class, 'destroy'])->name('logout');
});

Route::middleware('guest')->group( function () {
    Route::get('login', [SessionController::class, 'create'])->name('loginForm');
    Route::post('login', [SessionController::class, 'login'])->name('login');
    Route::get('register', [RegisterController::class, 'create'])->name('registerForm');
    Route::post('register', [RegisterController::class, 'store'])->name('register');
});

