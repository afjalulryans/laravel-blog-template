<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::with('category','author','blogTag.tag')->get();
//        return $blogs;
        return view('admin.blog.index',[
            'blogs' => $blogs
        ]);
    }

    public function addBlog(){
        $categories = Category::where('status',1)->get();
        $authors = Author::all();
        $tags = Tag::where('status',1)->get();
        return view('admin.blog.addBlog',[
            'categories' => $categories,
            'authors' => $authors,
            'tags' => $tags,
        ]);
    }

    public function saveBlog(Request $request){
        $blogImage = $request->file('image');
        $imageName = Date('Y-m-d-H-i-s').'-'.$blogImage->getClientOriginalName();
        $directory1 = 'assets/admin/blog-images/';
        $imageUrl1 = $directory1.$imageName;
        $directory2 = 'assets/admin/blog-images/small/';
        $imageUrl2 = $directory2.$imageName;
        Image::make($blogImage)->resize(730,400)->save($imageUrl1);
        Image::make($blogImage)->resize(80,60)->save($imageUrl2);

        $blog = new Blog();
        $blog->cat_id = $request->cat_id;
        $blog->title = $request->title;
        $blog->short_desc = $request->short_desc;
        $blog->long_desc = $request->long_desc;
        $blog->author_id = $request->author_id;
        $blog->image = $imageUrl1;
        $blog->status = $request->status;
        $blog->save();


        $tags = $request->tag_id;
        foreach ($tags as $tag){
            $blogTag = new BlogTag();
            $blogTag->blog_id = $blog->id;
            $blogTag->tag_id = $tag;
            $blogTag->save();
        }


        return back();

    }
}
