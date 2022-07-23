<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'number' => 'required',
            'address' => 'required',
            'method' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
        }

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'number' => $request->input('number'),
            'address' => $request->input('address'),
            'status' => 'pending',
            'method' => $request->input('method'),
            'price' => $request->input('total'),
            'transaction' => uniqid(),
        ]);

        $cart = \session()->has('cart') ? \session()->get('cart') : [];

        foreach ($cart as $product) {
            Item::create([
                'order_id' => $order->id,
                'product_id' => $product['product_id'],
                'qty' => $product['qty'],
                'price' => $product['price'],
            ]);
        }
        Session::forget('cart');
        Toastr::success('Order complete successful!!!');
        return redirect()->route('home');
    }
}
