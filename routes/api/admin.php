<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;

Route::middleware(['auth:sanctum', 'can:admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/users/{id}/posts', [UserController::class, 'getPosts'])->name('user.post.index');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('/users/{id}/restore', [UserController::class, 'restore'])->name('user.restore');

    Route::get('/posts', [PostController::class, 'index'])->name('post.index');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::post('/posts/{id}/restore', [PostController::class, 'restore'])->name('post.restore');
});
