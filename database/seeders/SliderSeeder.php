<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $fake): void
    {
        $sliders = [
            [
                "image" => "upload/slider/1.jpg",
                "thumb" => "upload/slider/thumbnail/1.jpg"
            ],
            [
                "image" => "upload/slider/2.jpg",
                "thumb" => "upload/slider/thumbnail/2.jpg"
            ],
            [
                "image" => "upload/slider/3.jpg",
                "thumb" => "upload/slider/thumbnail/3.jpg"
            ],
        ];

        foreach($sliders as $slid) {
            $slider = new Slider();
            $slider->title = $fake->text(80);
            $slider->image = $slid['image'];
            $slider->thumbnail = $slid['thumb'];

            $slider->save();
        }
    }
}
