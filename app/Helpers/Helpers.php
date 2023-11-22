<?php 

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

const SLIDER_IMAGES_PATH = 'upload/slider/';
const SLIDER_IMAGES_THUMBNAIL_PATH = 'upload/slider/thumbnail/';


function image_upload($dir, $image, $old = null) {

    // For update image;
    if($old) {
        unlink(public_path($old));
    }

    // Check upload directory;
    if(!is_dir(public_path($dir))) {
        mkdir(public_path($dir), 0777, true);
    }

    // Image name remake;
    $ext = $image->getClientOriginalExtension();
    $image_name = Str::slug($image->getClientOriginalName());
    $image_name = str_replace($ext, "", $image_name) . '-'. rand(1111, 9999) . '.' . strtolower($ext);

    // Image upload to public folder;
    Image::make($image)->save(public_path($dir) . $image_name);

    // return database name;
    return ($dir . $image_name);
    
}


function upload_custom_image($dir, $image, $old = null, $w, $h, $blur) {
    // For update image;
    if($old) {
        unlink(public_path($old));
    }

    // Check upload directory;
    if(!is_dir(public_path($dir))) {
        mkdir(public_path($dir), 0777, true);
    }

    // Image name remake;
    $ext = $image->getClientOriginalExtension();
    $image_name = Str::slug($image->getClientOriginalName());
    $image_name = str_replace($ext, "", $image_name) . '-'. rand(1111, 9999) . '.' . strtolower($ext);

    // Image upload to public folder;
    Image::make($image)
    ->fit($w, $h)
    ->blur($blur)
    ->save(public_path($dir) . $image_name);

    // return database name;
    return ($dir . $image_name);
}

