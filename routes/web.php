<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;




Route::get('/', [PostController::class, 'index'])->name('posts');
Route::get('posts/{post}', [PostController::class, 'show'])->name('post');


Route::middleware('guest')->group( function () {
    Route::get('login', [SessionController::class, 'create'])->name('loginForm');
    Route::post('login', [SessionController::class, 'login'])->name('login');
    Route::get('register', [RegisterController::class, 'create'])->name('registerForm');
    Route::post('register', [RegisterController::class, 'store'])->name('register');
});


Route::middleware('admin')->group( function () {
    
    Route::get('admin/posts', [AdminPostController::class, 'index'])->name('adminPosts');
    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->name('postEdit');
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->name('postUpdate');
    Route::get('admin/posts/{post}/postDelete', [AdminPostController::class, 'destroy'])->name('postDelete');

});

Route::middleware('auth')->group( function () {
    
    Route::get('posts/create', [PostController::class, 'create'])->name('postCreate');
    Route::post('posts', [PostController::class, 'store'])->name('postStore');
    
    Route::post('posts/{post}/comment', [PostCommentsController::class, 'store'])->name('comment');
    Route::get('logout', [SessionController::class, 'destroy'])->name('logout');

    Route::POST('newsletter',NewsletterController::class)->name('newsletter');

});
