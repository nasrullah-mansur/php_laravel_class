<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        $sliders = Slider::all();
        $categories = Category::all();

        $blogs = Blog::with('category')
        ->where('status', STATUS_MSG[0])
        ->orderBy('created_at', 'DESC')
        ->paginate(8);

        $popular_posts = Blog::with('category')
        ->where('status', STATUS_MSG[0])
        ->inRandomOrder()
        ->limit(3)
        ->get();

        $tags = Tag::inRandomOrder()
        ->limit(10)
        ->get();

        return view('welcome', compact(
            'categories', 
            'sliders', 
            'blogs',
            'popular_posts',
            'tags'
        ));
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
