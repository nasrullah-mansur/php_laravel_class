<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function index() {

       $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('back.category.index', compact('categories'));
    }




    public function create() {
        return view('back.category.create');
    }



    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:256',
        ]);

        $category = new Category();

        $category->name = $request->name; 
        $category->slug = Str::slug($request->name);

        $category->title = $request->title;
        $category->description = $request->description;
        $category->keyword = $request->keyword;
        $category->head_script = $request->head_script;
        $category->body_script = $request->body_script;

        $category->save();

        return redirect()->route('back.category.index')->with('success', 'Category added successful');

    }


    public function edit($slug) {
        $category = Category::where('slug', $slug)->firstOrFail();

        return view('back.category.edit', compact('category'));
    }


    public function update(Request $request, $slug) {
        $request->validate([
            'name' => 'required|max:256'
        ]);


        $category = Category::where('slug', $slug)->firstOrFail();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        $category->title = $request->title;
        $category->description = $request->description;
        $category->keyword = $request->keyword;
        $category->head_script = $request->head_script;
        $category->body_script = $request->body_script;

        $category->save();

        return redirect()->route('back.category.index')->with('success', 'Category updated successful');
    }


    public function delete(Request $request) { 
        $category = Category::where('slug', $request->slug)->firstOrFail();

        

        $blogs = Blog::where('category_id', $category->id)->get();

        foreach ($blogs as $blog) {
            deleteImg ($blog->image);
            deleteImg ($blog->image_sm);
            deleteImg ($blog->image_thumb);
            
            $blog->delete();
        }

        $category->delete();

        return redirect()->route('back.category.index')->with('success', 'Category removed successful');
    }
}
