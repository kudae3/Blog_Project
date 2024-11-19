<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $blogs = Blog::with('category')->latest();
    $categories = Category::all();

    if(request('search')){
        $blogs = $blogs->where('title', 'LIKE', '%'.request('search').'%');
    };
    $blogs = $blogs->get();
    return view('blogs', compact('blogs', 'categories'));
});

Route::get('/blogs/{blog:slug}', function(Blog $blog){
    return view('blog', [
        'blog' => $blog,
        'randomBlogs' => Blog::inRandomOrder()->take(3)->get(),
        'categories' => Category::all()
    ]);
})->name('blog');

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
