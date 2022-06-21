<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomeSlider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // home
    public function index() {
        $cate = Category::latest()->get();
        $slider = HomeSlider::latest()->get();
        return view('frontend.home',compact('cate','slider'));
    }
}
