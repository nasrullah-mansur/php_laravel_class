<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        // return $blogs = Blog::all();
        $blogs = Blog::with('category')->get();


        // return Category::with('blogs')->get();



        return view('back.blog.index', compact('blogs'));
    }

    public function create() {
        $categories = Category::all();
        return view('back.blog.create', compact('categories'));
    }

    public function store(Request $request) {

        $request->validate([
            'title' => 'required|max:256',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required|mimes:png,jpg',
            'details' => 'required',
        ]);

        $blog = new Blog();

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;
        $blog->image = upload_custom_image(BLOG_IMAGE, $request->image, null, 850, 420);
        $blog->image_sm = upload_custom_image(BLOG_IMAGE_SM, $request->image, null, 420, 208);
        $blog->image_thumb = upload_custom_image(BLOG_IMAGE_THUMB, $request->image, null, 100, 50);
        $blog->details = $request->details;

        // $blog->tags = $request->tags;

        $blog->keyword = $request->keyword;
        $blog->head_script = $request->head_script;
        $blog->body_script = $request->body_script;
        $blog->custom_html = $request->custom_html;
        $blog->custom_css = $request->custom_css;
        $blog->custom_js = $request->custom_js;
        $blog->image_alt = $request->image_alt;

        $blog->status = $request->status;

        $blog->save();

        return redirect()->route('back.blog.index')->with('success', 'Blog added successfully');

    }

    public function edit($slug) {
        
    }

    public function update(Request $request, $slug) {
        
    }

    public function delete(Request $request) {
        $blog = Blog::where('id', $request->id)->firstOrFail();

        deleteImg ($blog->image);
        deleteImg ($blog->image_sm);
        deleteImg ($blog->image_thumb);

        $blog->delete();

        return redirect()->route('back.blog.index')->with('success', 'Blog removed successfully');
    }
}
