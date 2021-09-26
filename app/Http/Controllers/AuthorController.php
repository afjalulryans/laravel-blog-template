<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::all();
        return view('admin.author.index',compact('authors'));
    }

    public function addAuthor(){
        return view('admin.author.add');
    }

    public function saveAuthor(Request $request){
        $authorImage = $request->file('image');
        $imageName = Date('Y-m-d-H-i-s').'-'.$authorImage->getClientOriginalName();
        $directory = 'assets/admin/author-images/';
        $authorImage->move($directory, $imageName);

        $imageUrl = $directory.$imageName;
        $author = new Author();
        $author->auth_name = $request->auth_name;
        $author->auth_desc = $request->auth_desc;
        $author->image = $imageUrl;
        $author->save();

        return back();
    }
}
