<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Toastr;
use Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::latest()->get();
        return view('backend.category', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name',
            'img' => 'required|mimes:png,jpg,jpeg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
        }

        try {
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $name = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/category/', $name);
            }
            Category::create([
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name')),
                'img' => 'uploads/category/' . $name
            ]);
            Toastr::success('Category create successfull!!');
            return redirect()->back();
        } catch (Exception $error) {
            Toastr::warning($error->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $cat = Category::find($id);
        if (file_exists(public_path($cat->img))) {
            unlink(public_path($cat->img));
        }
        $cat->delete();
        Toastr::success('Category deleted successfull!!');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
        }

        try {
            $cate = Category::find($id);
            $cate->name = $request->input('name');
            $cate->slug = Str::slug($request->input('name'));
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $name = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/category/', $name);

                if (file_exists(public_path($cate->img))) {
                    unlink(public_path($cate->img));
                }

                $cate->img = 'uploads/category/' . $name;
            }
            $cate->update();
            Toastr::success('Category update successfull!!');
            return redirect()->back();
        } catch (Exception $error) {
            Toastr::warning($error->getMessage());
            return redirect()->back();
        }
    }
}
