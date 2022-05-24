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
        return view('backend.product');
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

        $images = [];
        if ($request->hasFile('img')){
            foreach($request->img as  $image)
            { 
                $name = time().rand(1,99).'.'.$image->getClientOriginalExtension(); 
                $image->move('uploads/product/',$name);
                $images[]['name'] = $name;
            }
        }

        $pro = new Product();
        $pro->cate_id = $request->input('categroy');
        $pro->name = $request->input('name');
        $pro->slug = Str::slug($request->input('name'));
        $pro->price = $request->input('price');
        $pro->discount = $request->input('discount');
        $pro->condition = $request->input('condition');
        $pro->status = $request->input('status');
        $pro->short = $request->input('short');
        $pro->desc = $request->input('desc');
        $pro->img = json_encode($images);
        if ($request->input('new') == '1') {
            $pro->new = '1';
        } else {
            $pro->new = '0';
        }
        if ($request->input('feature') == '1') {
            $pro->feature = '1';
        } else {
            $pro->feature = '0';
        }
        if ($request->input('popular') == '1') {
            $pro->popular = '1';
        } else {
            $pro->popular = '0';
        }
        if ($request->input('best') == '1') {
            $pro->best = '1';
        } else {
            $pro->best = '0';
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
