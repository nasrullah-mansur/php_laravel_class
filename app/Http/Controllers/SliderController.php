<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{

    public function index() {
        $sliders = Slider::all();
        return view('back.slider.index', compact('sliders'));
    }

    public function create() {
        return view('back.slider.create');
    }

    public function store(Request $request) {

        $request->validate([
            'title' => 'required|max:256',
            'image' => 'required|image|mimes:png,jpg,gif,jpeg|max:2024'
        ]);

      

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->image = image_upload(SLIDER_IMAGES_PATH, $request->image, null);

        $slider->save();

        return redirect()->route('back.slider.index')->with('success', 'Image uploaded successful');


    }


    public function edit($id) {
        $slider = Slider::where('id', $id)->firstOrFail();

        return view('back.slider.edit', compact('slider'));
    }


    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|max:256',
            'image' => 'nullable|image|mimes:png,jpg,gif,jpeg|max:2024'
        ]);


        $slider = Slider::where('id', $id)->firstOrFail();

        $slider->title = $request->title;
        if($request->hasFile('image')) {
            $slider->image = image_upload(SLIDER_IMAGES_PATH, $request->image, $slider->image);
        }
       

        $slider->save();

        return redirect()->route('back.slider.index')->with('success', 'Image uploaded successful');

    }


    public function delete(Request $request) {
        
        $slider = Slider::where('id', $request->id)->firstOrFail();
        unlink(public_path($slider->image));

        $slider->delete();
        return redirect()->route('back.slider.index')->with('success', 'Image removed successful');
    }



}
