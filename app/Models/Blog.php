<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function scopeFilter($query, $filter){

        $query->when($filter['search']??false,function($query,$search){
            $query->where(function($query) use($search){
                $query->where('title','like', '%'.$search.'%')
                ->orWhere('body', 'like', '%'.$search.'%');
            });
        });

        $query->when($filter['category']??false,function($query, $slug){
            $query->whereHas('category', function($query) use($slug){
                $query->where('slug', $slug);
            });
        });

        $query->when($filter['author']??false, function($query,$username){
            $query->whereHas('author', function($query) use($username){
                $query->where('username', $username);
            });
        });
    }

    protected $with = ['category', 'author'];

    protected $guarded = [];
    // protected $fillable = ['title', 'intro', 'body'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function subscribers(){
        return $this->belongsToMany(User::class);
    }

    public function Subscribe(){
        $this->subscribers()->attach(auth()->id());
    }

    public function unSubscribed(){
        $this->subscribers()->detach(auth()->id());
    }

}

// blog - subscribers (users)
// user - blogs (subscribed)
