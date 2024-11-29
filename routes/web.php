<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);

Route::get('/register', [AuthController::class, 'create']);
Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'handleLogin']);

Route::post('/logout', [AuthController::class, 'logout']);

