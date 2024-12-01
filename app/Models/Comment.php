<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;
    protected $guarded = [];

    public function Blog(){
        return $this->belongsTo(Blog::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
