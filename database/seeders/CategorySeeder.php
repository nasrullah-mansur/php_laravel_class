<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Burger Bliss',
            'Pizza Paradise',
            'Sandwich Symphony',
            'Fried Chicken',
            'Chicken Roll'
        ];

        foreach($categories as $cat) {
            $category = new Category();

            $category->name = $cat; 
            $category->slug = Str::slug($cat);

            $category->save();
        }
    }
}
