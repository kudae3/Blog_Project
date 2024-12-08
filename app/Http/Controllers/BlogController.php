<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    //all blogs (main page)
    public function index() {

        // $blogs = $this->getBlogs();

        $blogs = Blog::latest()->filter(request(['search','category', 'author']))
                                ->paginate(6)
                                ->withQueryString();

        return view('blog.index', compact('blogs'));
    }

    //single blog
    public function show (Blog $blog){
        // $blog = $blog;
        $randomBlogs = Blog::inRandomOrder()->take(3)->get();
        return view('blog.show', compact('blog', 'randomBlogs'));
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

    //create blog
    public function create(){
        return view('blog.create');
    }


}
