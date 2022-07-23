<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // dashboard
    public function index() {
        return view('backend.dashboard');
    }

    // dashboard
    public function order() {
        $order = Order::all();
        return view('backend.order',compact('order'));
    }

    // dashboard
    public function orderUpdate(Request $request, $id) {
        Order::findorfail($id)->update([
            'status' => $request->status
        ]);
        Toastr::success('Order Status Update');
        return redirect()->back();
    }

    
    // dashboard
    public function orderDestroy($id) {
        Order::findorfail($id)->delete();
        Toastr::success('Order delete successfull');
        return redirect()->back();
    }
}
