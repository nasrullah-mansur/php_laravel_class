<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        $sliders = Slider::all();
        $categories = Category::get();

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

    public function blog_by_category($slug) {
        $categories = Category::all();

        $category = Category::where('slug', $slug)->firstOrFail();

        $blogs = Blog::where('category_id', $category->id)
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

        return view('front.blog', compact(
            'categories',
            'blogs',
            'tags',
            'popular_posts',
            'category'
        ));
    }

    public function single_blog($slug) {
        $categories = Category::all();

        $popular_posts = Blog::with('category')
        ->where('status', STATUS_MSG[0])
        ->inRandomOrder()
        ->limit(3)
        ->get();

        $blog = Blog::where('slug', $slug)->with('category', 'tags')->firstOrFail();


        $comments = Comment::where('parent_id', 0)
        ->with('replies')
        ->where('status', STATUS_MSG[0])
        ->where('blog_id', $blog->id)
        ->orderBy('created_at', 'asc')
        ->get();


       $tags = $blog->tags;

       $prev_blog = Blog::where('id', "<" , $blog->id)
       ->orderBy('created_at', 'DESC')
       ->first(['title', 'slug']);

       $next_blog = Blog::where('id', ">" , $blog->id)
       ->orderBy('created_at', 'DESC')
       ->first(['title', 'slug']);

       $related_blogs = Blog::where('status', STATUS_MSG[0])
       ->where('category_id', $blog->category_id)
       ->inRandomOrder()
        ->limit(3)
        ->get();

        return view('front.single_blog', compact(
            'categories',
            'popular_posts',
            'tags',
            'blog',
            'prev_blog',
            'next_blog',
            'related_blogs',
            'comments'
        ));
    }


    public function contact() {
        return view('front.contact');
    }

}
