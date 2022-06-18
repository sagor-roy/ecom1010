<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('cate')->get();
        return view('backend.product',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::latest()->get();
        return view('backend.create_product',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'category'=>'required',
            'price'=>'required',
            'short'=>'required',
            'desc'=>'required',
            'img' => 'required',
            'img.*' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
        }

        if ($request->hasFile('img')){
            foreach($request->img as  $image)
            { 
                $name = time().rand(1,99).'.'.$image->getClientOriginalExtension(); 
                $image->move('uploads/product/',$name);
                $images[] = 'uploads/product/'.$name;
            }
        }

        $pro = new Product();
        $pro->cate_id = $request->input('category');
        $pro->name = $request->input('name');
        $pro->slug = Str::slug($request->input('name'));
        $pro->price = $request->input('price');
        $pro->discount = $request->input('discount');
        $pro->condition = $request->input('condition');
        $pro->status = $request->input('status');
        $pro->short = $request->input('short');
        $pro->desc = $request->input('desc');
        $pro->img = json_encode($images);
        $pro->new = $request->new == '1' ? '1':'0';
        $pro->feature = $request->feature == '1' ? '1':'0';
        $pro->popular = $request->popular == '1' ? '1':'0';
        $pro->best = $request->best == '1' ? '1':'0';
        $pro->save();
        Toastr::success('Prouduct create successfull!!!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::latest()->get();
        $pro = Product::find($id);
        return view('backend.edit_product',compact('data','pro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'category'=>'required',
            'price'=>'required',
            'short'=>'required',
            'desc'=>'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
        }

        $pro = Product::find($id);
        $pro->cate_id = $request->input('category');
        $pro->name = $request->input('name');
        $pro->slug = Str::slug($request->input('name'));
        $pro->price = $request->input('price');
        $pro->discount = $request->input('discount');
        $pro->condition = $request->input('condition');
        $pro->status = $request->input('status');
        $pro->short = $request->input('short');
        $pro->desc = $request->input('desc');
        if ($request->hasFile('img')){

            foreach($request->img as  $image)
            { 
                $name = time().rand(1,99).'.'.$image->getClientOriginalExtension(); 
                $image->move('uploads/product/',$name);
                $images[] = 'uploads/product/'.$name;
            }

            foreach (json_decode($pro->img) as $imag) {
                if (file_exists(public_path($imag))) {
                    unlink(public_path($imag));
                }
            }
            $pro->img = json_encode($images);
        }
        $pro->new = $request->new == '1' ? '1':'0';
        $pro->feature = $request->feature == '1' ? '1':'0';
        $pro->popular = $request->popular == '1' ? '1':'0';
        $pro->best = $request->best == '1' ? '1':'0';
        $pro->update();
        Toastr::success('Prouduct update successfull!!!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro = Product::find($id);
        foreach (json_decode($pro->img) as $imag) {
            if (file_exists(public_path($imag))) {
                unlink(public_path($imag));
            }
        }
        $pro->delete();
        Toastr::success('Prouduct delete successfull!!!');
        return redirect()->back();
    }
}
