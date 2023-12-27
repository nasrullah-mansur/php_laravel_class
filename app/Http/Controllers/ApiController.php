<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    function sliders() {
        $sliders = Slider::get();
        return response()->json($sliders);
    }

    function blogs() {
        $blogs = Blog::with(['category' => function ($query) {
        $query->select(['id', 'name', 'slug']); 
    }])
        ->where('status', STATUS_MSG[0])
        ->orderBy('created_at', 'DESC')
        ->paginate(8, ['title', 'image', 'slug', 'description', 'category_id', 'created_at']);

        return response()->json($blogs);
    }

    function categories() {
        $categories = Category::with(['blogs' => function($blog) {
            $blog->select(['id', 'category_id']);
        }])->get();

        return response()->json($categories);
    }

    function single_blog($slug) {
        $blog = Blog::where('slug', $slug)
        ->with(['category' => function($query) {
            $query->select(['id', 'name', 'slug']);
        }])
        ->firstOrFail();

         return response()->json($blog);
    }
}
