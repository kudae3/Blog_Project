<?php

use App\Http\Controllers\BlogController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->name('blog');

Route::get('/categories/{category:slug}', function(Category $category){
   $blogs = $category->blogs;
   $categories = Category::all();
   $currentcategory = $category;
   return view('blogs', compact('blogs', 'categories', 'currentcategory'));
})->name('category');

Route::get('/author/{user:username}', function(User $user){
    $blogs = $user->blogs;
    $categories = Category::all();
    return view('blogs', compact('blogs', 'categories'));
})->name('author');
