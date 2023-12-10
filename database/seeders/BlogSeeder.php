<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Blog;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $fake): void
    {
        foreach($this->data() as $data) {
            $blog = new Blog();

            $blog->title = $fake->text(100);
            $blog->slug = Str::slug($blog->title) . '-' . rand(111,999);
            $blog->description = $fake->text(120, 160);
            $blog->category_id = $data['category_id'];


            $blog->image = $data['image'];
            $blog->image_sm = $data['sm'];
            $blog->image_thumb = $data['thumb'];

            // $blog->image = upload_custom_image(BLOG_IMAGE, $data['image'], null, 1200, 630);
            // $blog->image_sm = upload_custom_image(BLOG_IMAGE_SM, $data['image'], null, 1200, 630);
            // $blog->image_thumb = upload_custom_image(BLOG_IMAGE_THUMB, $data['image'], null, 250, 250);

            $blog->details = $fake->paragraphs(10, true);
    
            $blog->keyword = $fake->text(120);

            // $blog->head_script = null;
            // $blog->body_script = null;
            // $blog->custom_html = null;
            // $blog->custom_css = null;
            // $blog->custom_js = null;
            $blog->image_alt = 'Image alt';
    
            $blog->status = STATUS_MSG[0];

    
            $blog->save();

            $tags = explode(' ', $fake->text(30));

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

            $blog->tags()->sync($newTags); 
       

        }
    }



    public function data() {
        return $foods = [
            [
                "image" => "upload/blog/1.jpg",
                "thumb" => "upload/blog/thumb/1.jpg",
                "sm" => "upload/blog/sm/1.jpg",
                "category_id" => 1
            ],
            [
                "image" => "upload/blog/2.jpg",
                "thumb" => "upload/blog/thumb/2.jpg",
                "sm" => "upload/blog/sm/2.jpg",
                "category_id" => 1
            ],
            [
                "image" => "upload/blog/3.jpg",
                "thumb" => "upload/blog/thumb/3.jpg",
                "sm" => "upload/blog/sm/3.jpg",
                "category_id" => 1
            ],
            [
                "image" => "upload/blog/4.jpg",
                "thumb" => "upload/blog/thumb/4.jpg",
                "sm" => "upload/blog/sm/4.jpg",
                "category_id" => 2
            ],
            [
                "image" => "upload/blog/5.jpg",
                "thumb" => "upload/blog/thumb/5.jpg",
                "sm" => "upload/blog/sm/5.jpg",
                "category_id" => 2
            ],
            [
                "image" => "upload/blog/6.jpg",
                "thumb" => "upload/blog/thumb/6.jpg",
                "sm" => "upload/blog/sm/6.jpg",
                "category_id" => 2
            ],
            [
                "image" => "upload/blog/7.jpg",
                "thumb" => "upload/blog/thumb/7.jpg",
                "sm" => "upload/blog/sm/7.jpg",
                "category_id" => 2
            ],
            [
                "image" => "upload/blog/8.jpg",
                "thumb" => "upload/blog/thumb/8.jpg",
                "sm" => "upload/blog/sm/8.jpg",
                "category_id" => 3
            ],
            [
                "image" => "upload/blog/9.jpg",
                "thumb" => "upload/blog/thumb/9.jpg",
                "sm" => "upload/blog/sm/9.jpg",
                "category_id" => 3
            ],
            [
                "image" => "upload/blog/10.jpg",
                "thumb" => "upload/blog/thumb/10.jpg",
                "sm" => "upload/blog/sm/10.jpg",
                "category_id" => 3
            ],
            [
                "image" => "upload/blog/11.jpg",
                "thumb" => "upload/blog/thumb/11.jpg",
                "sm" => "upload/blog/sm/11.jpg",
                "category_id" => 4
            ],
            [
                "image" => "upload/blog/12.jpg",
                "thumb" => "upload/blog/thumb/12.jpg",
                "sm" => "upload/blog/sm/12.jpg",
                "category_id" => 4
            ],
            [
                "image" => "upload/blog/13.jpg",
                "thumb" => "upload/blog/thumb/13.jpg",
                "sm" => "upload/blog/sm/13.jpg",
                "category_id" => 4
            ],
            [
                "image" => "upload/blog/14.jpg",
                "thumb" => "upload/blog/thumb/14.jpg",
                "sm" => "upload/blog/sm/14.jpg",
                "category_id" => 4
            ],
            [
                "image" => "upload/blog/15.jpg",
                "thumb" => "upload/blog/thumb/15.jpg",
                "sm" => "upload/blog/sm/15.jpg",
                "category_id" => 5
            ],
            [
                "image" => "upload/blog/16.jpg",
                "thumb" => "upload/blog/thumb/16.jpg",
                "sm" => "upload/blog/sm/16.jpg",
                "category_id" => 5
            ],
            [
                "image" => "upload/blog/1.jpg",
                "thumb" => "upload/blog/thumb/1.jpg",
                "sm" => "upload/blog/sm/1.jpg",
                "category_id" => 1
            ],
            [
                "image" => "upload/blog/2.jpg",
                "thumb" => "upload/blog/thumb/2.jpg",
                "sm" => "upload/blog/sm/2.jpg",
                "category_id" => 1
            ],
            [
                "image" => "upload/blog/3.jpg",
                "thumb" => "upload/blog/thumb/3.jpg",
                "sm" => "upload/blog/sm/3.jpg",
                "category_id" => 1
            ],
            [
                "image" => "upload/blog/4.jpg",
                "thumb" => "upload/blog/thumb/4.jpg",
                "sm" => "upload/blog/sm/4.jpg",
                "category_id" => 2
            ],
            [
                "image" => "upload/blog/5.jpg",
                "thumb" => "upload/blog/thumb/5.jpg",
                "sm" => "upload/blog/sm/5.jpg",
                "category_id" => 2
            ],
            [
                "image" => "upload/blog/6.jpg",
                "thumb" => "upload/blog/thumb/6.jpg",
                "sm" => "upload/blog/sm/6.jpg",
                "category_id" => 2
            ],
            [
                "image" => "upload/blog/7.jpg",
                "thumb" => "upload/blog/thumb/7.jpg",
                "sm" => "upload/blog/sm/7.jpg",
                "category_id" => 2
            ],
            [
                "image" => "upload/blog/8.jpg",
                "thumb" => "upload/blog/thumb/8.jpg",
                "sm" => "upload/blog/sm/8.jpg",
                "category_id" => 3
            ],
            [
                "image" => "upload/blog/9.jpg",
                "thumb" => "upload/blog/thumb/9.jpg",
                "sm" => "upload/blog/sm/9.jpg",
                "category_id" => 3
            ],
            [
                "image" => "upload/blog/10.jpg",
                "thumb" => "upload/blog/thumb/10.jpg",
                "sm" => "upload/blog/sm/10.jpg",
                "category_id" => 3
            ],
            [
                "image" => "upload/blog/11.jpg",
                "thumb" => "upload/blog/thumb/11.jpg",
                "sm" => "upload/blog/sm/11.jpg",
                "category_id" => 4
            ],
            [
                "image" => "upload/blog/12.jpg",
                "thumb" => "upload/blog/thumb/12.jpg",
                "sm" => "upload/blog/sm/12.jpg",
                "category_id" => 4
            ],
            [
                "image" => "upload/blog/13.jpg",
                "thumb" => "upload/blog/thumb/13.jpg",
                "sm" => "upload/blog/sm/13.jpg",
                "category_id" => 4
            ],
            [
                "image" => "upload/blog/14.jpg",
                "thumb" => "upload/blog/thumb/14.jpg",
                "sm" => "upload/blog/sm/14.jpg",
                "category_id" => 4
            ],
            [
                "image" => "upload/blog/15.jpg",
                "thumb" => "upload/blog/thumb/15.jpg",
                "sm" => "upload/blog/sm/15.jpg",
                "category_id" => 5
            ],
            [
                "image" => "upload/blog/16.jpg",
                "thumb" => "upload/blog/thumb/16.jpg",
                "sm" => "upload/blog/sm/16.jpg",
                "category_id" => 5
            ],
            
        ];
    }
}
