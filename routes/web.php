<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $blogs = Blog::with('category')->latest()->get();
    return view('blogs', compact('blogs'));
});

Route::get('/blogs/{blog:slug}', function(Blog $blog){
    return view('blog', [
        'blog' => $blog,
        'randomBlogs' => Blog::inRandomOrder()->take(3)->get()
    ]);
})->name('blog');

Route::get('/categories/{category:slug}', function(Category $category){
   $blogs = $category->blogs;
   return view('blogs', compact('blogs'));
})->name('category#slug');

Route::get('/author/{user:username}', function(User $user){
    $blogs = $user->blogs;
    return view('blogs', compact('blogs'));
})->name('blogs#author');
