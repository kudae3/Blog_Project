<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //all blogs (main page)
    public function index() {

        $categories = Category::all();

        // $blogs = $this->getBlogs();

        $blogs = Blog::latest()->filter(request(['search','category']))->get();

        return view('blogs', compact('blogs', 'categories'));
    }

    //single blog
    public function show (Blog $blog){
        return view('blog', [
            'blog' => $blog,
            'randomBlogs' => Blog::inRandomOrder()->take(3)->get(),
            'categories' => Category::all()
        ]);
    }

    //get blogs
    protected function getBlogs(){

        $query = Blog::latest();

        $query->when(request('search'),function($query,$search){
            $query->where(function($query) use($search){
                $query  ->where('body', 'like', '%'.$search.'%')
                        ->orWhere('title', 'like', '%'.$search.'%');
            });
        });


        return $query->get();
    }

}
