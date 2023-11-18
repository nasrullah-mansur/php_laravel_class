<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function index() {

       $categories = Category::all();

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

        $category->save();

        return redirect()->route('back.category.create')->with('success', 'Category added successful');

    }


    public function edit($slug) {
        $category = Category::where('slug', $slug)->firstOrFail(['name', 'slug']);

        return view('back.category.edit', compact('category'));
    }


    public function update(Request $request, $slug) {
        $request->validate([
            'name' => 'required|max:256'
        ]);


        $category = Category::where('slug', $slug)->firstOrFail();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        $category->save();

        return redirect()->route('back.category.index')->with('success', 'Category updated successful');
    }


    public function delete(Request $request) { 
        $category = Category::where('slug', $request->slug)->firstOrFail();

        $category->delete();

        return redirect()->route('back.category.index')->with('success', 'Category removed successful');
    }
}
