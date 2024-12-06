<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function handleSubscribe(Blog $blog){

        if (auth()->user()->isSubscribed($blog)) {
            $blog->unSubscribed();
        }
        else{
            $blog->Subscribe();
        }

        return redirect()->back();

    }
}
