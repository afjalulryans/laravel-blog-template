<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Dotenv\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function addCategory(){
        return view('admin.category.create-category');
    }

    public function saveCategory(Request $request){
        $request->validate([
            'cat_name' => 'required|alpha|max:20|min:2',
            'cat_desc' => 'required',
            'status' => 'required'
        ]);

        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->cat_desc = $request->cat_desc;
        $category->status = $request->status;
        $category->save();

        return back()->with('message','Category Added Successfully');
    }
}
