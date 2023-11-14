<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

        $category->save();

        return redirect()->route('back.category.create')->with('success', 'Category added successful');

    }
}
