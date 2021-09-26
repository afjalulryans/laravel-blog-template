<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function getBlogs(){
        $blogs = Blog::with('category','author','blogTag.tag')->orderBy('id','DESC')->get();
        return response()->json([
           'blogs' => $blogs
        ]);
    }

    public function getSingleBlog($id){
        $blog = Blog::with('category','author','blogTag.tag','comment')->find($id);
//        return $blog;
        return response()->json([
            'blog' => $blog
        ]);
    }

    public function getCategories(){
        $categories = Category::with('blog')->where('status',1)->get();
        return response()->json([
            'categories' => $categories
        ]);
    }

    public function getTags(){
        $tags = Tag::where('status',1)->get();
        return response()->json([
            'tags' => $tags
        ]);
    }
    public function getCatBlogs($id){
        $blogs = Blog::with('category','author','blogTag.tag')
            ->where('cat_id',$id)
            ->orderBy('id','DESC')
            ->get();
        return response()->json([
            'blogs' => $blogs
        ]);
    }

    public function getSearch(){
        $search = \Request::get('s');
        $blogs = Blog::with('category','author','blogTag.tag')
                    ->where('title','LIKE',"%$search%")
                    ->orWhere('short_desc','LIKE',"%$search%")
                    ->orderBy('id','DESC')
                    ->get();
        return response()->json([
            'blogs' => $blogs
        ]);
    }

    public function addComment(Request $request){
        $this->validate($request,[
            'name' => 'required|alpha',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

        $comment = new Comment();
        $comment->blog_id = $request->blog_id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->save();

        return ['message'=>'ok'];
    }
}
