<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use Exception;
use Illuminate\Http\Request;
use Toastr;
use Validator;

class HomeSettingController extends Controller
{
    public function index() {
        $data = HomeSlider::latest()->get();
        return view('backend.home_setting',compact('data'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:home_sliders,title',
            'desc' => 'required',
            'img' => 'required|mimes:png,jpg,jpeg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
        }

        try {
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $name = time().'.'.$file->getClientOriginalExtension(); 
                $file->move('uploads/slider/',$name);
            }
            HomeSlider::create([
                'title'=>$request->input('title'),
                'desc'=>$request->input('desc'),
                'img'=>'uploads/slider/'.$name
            ]);
            Toastr::success('Slider create successfull!!');
            return redirect()->back();
        } catch (Exception $error) {
            Toastr::warning($error->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request,$id) {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
        }

        try {
            $slider = HomeSlider::find($id);
            $slider->title = $request->input('title');
            $slider->desc = $request->input('desc');
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $name = time().'.'.$file->getClientOriginalExtension(); 
                $file->move('uploads/slider/',$name);

                if (file_exists(public_path($slider->img))) {
                    unlink(public_path($slider->img));
                }
                
                $slider->img = 'uploads/slider/'.$name;
            }
            $slider->update();
            Toastr::success('Slider update successfull!!');
            return redirect()->back();
        } catch (Exception $error) {
            Toastr::warning($error->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id) {
        $slider = HomeSlider::find($id);
        if (file_exists(public_path($slider->img))) {
            unlink(public_path($slider->img));
        }
        $slider->delete();
        Toastr::success('Slider deleted successfull!!');
        return redirect()->back();
    }
}
