<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{

    //main view
    public function index(){
        return view('admin.blog.index', [
            'blogs' => Blog::latest()->paginate(5)
        ]);
    }

    //create blog
    public function create(){
        return view('admin.blog.create', [
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

        if(request('thumbnail')){
            $path = request()->file('thumbnail')->store('thumbnails');
            $data['thumbnail'] = $path;
        };

        $data['user_id'] = auth()->user()->id;

        Blog::create($data);

        return redirect('/');

    }

    //destroy
    public function destroy(Blog $blog){
       $blog->delete();
       return back();
    }
}
