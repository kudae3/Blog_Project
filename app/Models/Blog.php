<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
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

}
