<?php

use App\Http\Middleware\MustBeAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\SubscribeController;

Route::get('/', [BlogController::class, 'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
Route::post('/blogs/{blog:slug}/comment', [CommentController::class, 'store']);
Route::post('/blogs/{blog:slug}/subscription', [SubscribeController::class, 'handleSubscribe']);

Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'handleLogin'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

//admin
Route::middleware(['admin'])->group(function(){
    Route::get('/admin/blogs', [AdminBlogController::class, 'index']);
    Route::get('/admin/blogs/create', [AdminBlogController::class, 'create']);
    Route::post('/admin/blogs/store', [AdminBlogController::class, 'store']);
    Route::delete('/admin/blogs/{blog}/delete', [AdminBlogController::class, 'destroy']);
    Route::get('/admin/blogs/{blog:slug}/edit', [AdminBlogController::class, 'edit']);
    Route::patch('/admin/blogs/{blog:slug}/update', [AdminBlogController::class, 'update']);

});

