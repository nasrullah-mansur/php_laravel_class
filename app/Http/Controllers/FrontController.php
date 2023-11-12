<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        return view('welcome');
    }


    public function blog() {
        return view('front.blog');
    }

    public function contact() {
        return view('front.contact');
    }

    public function single_blog() {
        return view('front.single_blog');
    }
}
