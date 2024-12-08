<?php

use App\Http\Middleware\MustBeAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubscribeController;

Route::get('/', [BlogController::class, 'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
Route::post('/blogs/{blog:slug}/comment', [CommentController::class, 'store']);
Route::post('/blogs/{blog:slug}/subscription', [SubscribeController::class, 'handleSubscribe']);

Route::get('/blogs/admin/create', [BlogController::class, 'create'])->middleware('admin');
Route::post('/blogs/admin/store', [BlogController::class, 'store'])->middleware('admin');

Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');

Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'handleLogin']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');


