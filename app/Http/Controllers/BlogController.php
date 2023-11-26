<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {

    }

    public function create() {
        $categories = Category::all();
        return view('back.blog.create', compact('categories'));
    }

    public function store(Request $request) {
        return $request;
    }

    public function edit($slug) {
        
    }

    public function update(Request $request, $slug) {
        
    }

    public function delete(Request $request) {
        
    }
}
