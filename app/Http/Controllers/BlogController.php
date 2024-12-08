<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        return view('blog.create', [
            'categories' => Category::all()
        ]);
    }

    //store form data
    public function store(){


        $data = request()->validate([
            'title' => ['required'],
            'intro' => ['required'],
            'slug' => ['required', Rule::unique('blogs', 'slug')],
            'thumbnail' => ['extensions:jpg,jpeg,png'],
            'body'=> ['required'],
            'category_id' => ['required', Rule::exists('blogs', 'id')]
        ]);

        $path = request()->file('thumbnail')->store('thumbnails');

        $data['user_id'] = auth()->user()->id;
        $data['thumbnail'] = $path;

        Blog::create($data);

        return redirect('/');

    }

}
