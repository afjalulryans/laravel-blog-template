<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function author(){
        return $this->belongsTo(Author::class,'author_id');
    }

    public function blogTag(){
        return $this->hasMany(BlogTag::class,'blog_id');
    }
    
    public function comment(){
        return $this->hasMany(Comment::class,'blog_id');
    }
}
