<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if(request('thumbnail')){
            $path = request()->file('thumbnail')->store('thumbnails');
            $data['thumbnail'] = $path;
        };

        $data['user_id'] = Auth::user()->id;

        Blog::create($data);

        return redirect('/');

    }

    //destroy
    public function destroy(Blog $blog){
        $blog->thumbnail ? Storage::delete($blog->thumbnail) : '';
        $blog->delete();
        return back();
    }

    //edit
    public function edit(Blog $blog){
        return view('admin.blog.edit', [
            'blog' => $blog,
            'categories' => Category::all()
        ]);
    }

    //update
    public function update(Blog $blog){

        $data = request()->validate([
            'title' => ['required'],
            'intro' => ['required'],
            'slug' => ['required', Rule::unique('blogs', 'slug')->ignore($blog->id)],
            'thumbnail' => ['extensions:jpg,jpeg,png'],
            'body'=> ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if(request('thumbnail')){
            Storage::delete($blog->thumbnail);
            $path = request()->file('thumbnail')->store('thumbnails');
            $data['thumbnail'] = $path;

        }else{
            $data['thumbnail'] = $blog->thumbnail;
        };

        $data['user_id'] = Auth::user()->id;

        $blog->update($data);

        return redirect('/');
    }
}
