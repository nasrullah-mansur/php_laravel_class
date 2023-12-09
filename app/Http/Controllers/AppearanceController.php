<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppearanceController extends Controller
{
    function create() {
        return view('back.appearance.create');
    }
}
