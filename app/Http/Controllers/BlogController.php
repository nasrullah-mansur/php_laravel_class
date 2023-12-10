<?php

namespace App\Http\Controllers;

use App\DataTables\BlogDataTable;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(BlogDataTable $dataTable) {
        return $dataTable->render('back.blog.index');
    }

    public function create() {
        $categories = Category::all();
        return view('back.blog.create', compact('categories'));
    }

    public function store(Request $request) {

        // return $request;

        $request->validate([
            'title' => 'required|max:256',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required|mimes:png,jpg',
            'details' => 'required',
        ], [
            'category_id.required' => 'The category field is required.'
        ]);

        $blog = new Blog();

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title) . '-' . rand(111,999);
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;
        $blog->image = upload_custom_image(BLOG_IMAGE, $request->image, null, 850, 420);
        $blog->image_sm = upload_custom_image(BLOG_IMAGE_SM, $request->image, null, 420, 208);
        $blog->image_thumb = upload_custom_image(BLOG_IMAGE_THUMB, $request->image, null, 100, 50);
        $blog->details = $request->details;

        $blog->keyword = $request->keyword;
        $blog->head_script = $request->head_script;
        $blog->body_script = $request->body_script;
        $blog->custom_html = $request->custom_html;
        $blog->custom_css = $request->custom_css;
        $blog->custom_js = $request->custom_js;
        $blog->image_alt = $request->image_alt;

        $blog->status = $request->status;


        $blog->save();

        if($request->tags) {
            $tags = explode(',', $request->tags);
            
            if(count($tags) > 0) {
                $newTags = [];

                foreach($tags as $val) {
                    $tag_exist = Tag::where('name', trim($val))->first();
                    $tag = new Tag();

                    $tag->name = trim($val);
                    $tag->slug = Str::slug($val);

                    if($tag_exist) {
                        $tag = $tag_exist;
                    }
    
                    $tag->save();

                    array_push($newTags, $tag->id);
                }

                $newTags;

                $blog->tags()->sync($newTags); 

            }


        }

        return redirect()->route('back.blog.index')->with('success', 'Blog added successfully');

    }

    public function edit($slug) {
        $categories = Category::all();
        $blog = Blog::with('tags')->where('slug', $slug)->firstOrFail();

        $tags = $blog->tags;
        $tag_names = null;

        if(count($tags) > 0) {
            foreach($tags as $tag) {
                $tag_names .= $tag->name . ',';
                // return $tag->name;
            }
        }

        return view('back.blog.edit', compact('categories', 'blog', 'tag_names'));

    }

    public function update(Request $request, $slug) {
        $request->validate([
            'title' => 'required|max:256',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|mimes:png,jpg',
            'details' => 'required',
        ]);

        $blog = Blog::where('slug', $slug)->firstOrFail();

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title) . '-' . rand(111,999);
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;
        if($request->hasFile('image')) {
            $blog->image = upload_custom_image(BLOG_IMAGE, $request->image, $blog->image, 850, 420);
            $blog->image_sm = upload_custom_image(BLOG_IMAGE_SM, $request->image, $blog->image_sm, 420, 208);
            $blog->image_thumb = upload_custom_image(BLOG_IMAGE_THUMB, $request->image, $blog->image_thumb, 100, 50);
        }
        $blog->details = $request->details;

        $blog->keyword = $request->keyword;
        $blog->head_script = $request->head_script;
        $blog->body_script = $request->body_script;
        $blog->custom_html = $request->custom_html;
        $blog->custom_css = $request->custom_css;
        $blog->custom_js = $request->custom_js;
        $blog->image_alt = $request->image_alt;

        $blog->status = $request->status;

        $blog->save();

        if($request->tags) {
            $tags = explode(',', $request->tags);
            
            if(count($tags) > 0) {
                $newTags = [];

                foreach($tags as $val) {
                    $tag_exist = Tag::where('name', trim($val))->first();
                    $tag = new Tag();

                    $tag->name = trim($val);
                    $tag->slug = Str::slug($val);

                    if($tag_exist) {
                        $tag = $tag_exist;
                    }
    
                    $tag->save();

                    array_push($newTags, $tag->id);
                }

                $newTags;

                $blog->tags()->sync($newTags); 

            }


        }

        return redirect()->route('back.blog.index')->with('success', 'Blog updated successfully');
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
