<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    // home
    public function index()
    {
        $cate = Category::latest()->get();
        $slider = HomeSlider::latest()->get();
        $first = \App\Models\Category::orderBy('id', 'desc')->take(4)->get();
        $second = \App\Models\Category::orderBy('id', 'desc')->skip(4)->take(4)->get();
        $third = \App\Models\Category::orderBy('id', 'desc')->skip(8)->take(4)->get();
        $new = Product::where('status', 1)->where('new', '1')->latest()->limit(3)->get();
        $feature = Product::where('status', 1)->where('feature', '1')->latest()->limit(3)->get();
        $popular = Product::where('status', 1)->where('popular', '1')->latest()->limit(3)->get();
        $best = Product::where('status', 1)->where('best', '1')->latest()->limit(3)->get();
        return view('frontend.home', compact('cate', 'slider', 'first', 'second', 'third', 'new', 'feature', 'popular', 'best'));
    }

    public function list($name)
    {
        $product = Product::where('status', 1)->where($name, 1)->get();
        return view('frontend.list', compact('product'));
    }

    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $related = Product::where('cate_id', '!=', $product->cate_id)->limit(5)->get();
        return view('frontend.product_detail', compact('product', 'related'));
    }

    public function cart()
    {
        return view('frontend.card');
    }

    public function addCart($id)
    {
        $product = Product::findorfail($id);
        $cart = \session()->has('cart') ? \session()->get('cart') : [];
        if (key_exists($product->id, $cart)) {
            Toastr::error('Product already add to cart');
            return redirect()->back();
        } else {
            $cart[$product->id] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'img' => $product->img,
                'price' => $product->price,
                'qty' => 1
            ];
            \session(['cart' => $cart]);
            Toastr::success('Product add to cart');
            return redirect()->back();
        }
    }

    public function deleteProduct($id)
    {
        $cart = \session()->has('cart') ? \session()->get('cart') : [];
        foreach ($cart as $key => $product) {
            if ($product['product_id'] == $id) {
                unset($cart[$key]);
            }
        }
        \session(['cart' => $cart]);
        Toastr::success('Product delete to cart');
        return redirect()->back();
    }
}
