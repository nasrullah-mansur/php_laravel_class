<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    public function blogs() {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }


    public function getBlogCountAttribute() {
        return $this->blogs()->count();
    }


    // protected static function boot()
    // {
    //     parent::boot();

    //     // Listen for the 'deleting' event on the Category model
    //     static::deleting(function ($category) {
    //         // Delete associated blog posts
    //         $category->blogs()->delete();
    //     });
    // }
}
