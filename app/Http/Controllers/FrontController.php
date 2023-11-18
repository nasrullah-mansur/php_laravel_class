<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {

        $categories = Category::all();

        return view('welcome', compact('categories'));
    }


    public function blog() {
        $categories = Category::all();
        return view('front.blog', compact('categories'));
    }

    public function contact() {
        return view('front.contact');
    }

    public function single_blog() {
        $categories = Category::all();
        return view('front.single_blog', compact('categories'));
    }
}
