<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Mail\SubscriberMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog){

        request()->validate([
            'comment' => 'required|min:10'
        ]);

        $blog->comments()->create([
            'body' => request('comment'),
            'user_id' => auth()->user()->id
        ]);

        //mail
        $subscribers = $blog->subscribers->filter(fn($subscriber)=>$subscriber->id !== auth()->id());

        $subscribers->each(function($subscriber) use($blog){
            Mail::to($subscriber->email)->send(new SubscriberMail($blog));
        });


        return redirect('http://127.0.0.1:8000/blogs/'.$blog->slug);

    }
}
