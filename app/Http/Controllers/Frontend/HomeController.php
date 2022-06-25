<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // home
    public function index() {
        $cate = Category::latest()->get();
        $slider = HomeSlider::latest()->get();
        $first = \App\Models\Category::orderBy('id','desc')->take(4)->get();
        $second = \App\Models\Category::orderBy('id','desc')->skip(4)->take(4)->get();
        $third = \App\Models\Category::orderBy('id','desc')->skip(8)->take(4)->get();
        $new = Product::where('status',1)->where('new','1')->latest()->limit(3)->get();
        $feature = Product::where('status',1)->where('feature','1')->latest()->limit(3)->get();
        $popular = Product::where('status',1)->where('popular','1')->latest()->limit(3)->get();
        $best = Product::where('status',1)->where('best','1')->latest()->limit(3)->get();
        return view('frontend.home',compact('cate','slider','first','second','third','new','feature','popular','best'));
    }
}
