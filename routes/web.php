<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\updateUserController;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // update user details
    Route::get('/settings', [updateUserController::class, 'index'])->name('user.settings');
    Route::post('/settings/update/', [updateUserController::class, 'update'])->name('user.update');
    Route::get('/settings/destroy', [updateUserController::class, 'destroy']);

    // home page
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // post related routes
    Route::post('/create', [PostController::class, 'store'])->name('post.store');
    Route::post('/update', [PostController::class, 'update'])->name('post.update');
    Route::get('/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
    Route::post('/{id}/comment', [PostController::class, 'createComment'])->name('create.comment');
    Route::post('/like-post/{id}',[PostController::class,'likePost'])->name('like.post');
    Route::post('/unlike-post/{id}',[PostController::class,'unlikePost'])->name('unlike.post');
});


