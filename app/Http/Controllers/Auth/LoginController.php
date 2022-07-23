<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        return view('frontend.auth.login');
    }

    public function access(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
        }

        $creadential = $request->only(['email', 'password']);

        if (Auth::attempt($creadential)) {
            if (Auth::user()->role == 'admin') {
                Toastr::success('Welcome to Dashboard');
                return redirect()->route('admin.dashboard');
            }
            Toastr::success('Successfully Logged In');
            return redirect()->back();
        }
        Toastr::error('Creadential does\'t match our record');
        return redirect()->back();
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
        }

        $user = User::create([
            'role' => 'user',
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        Auth::login($user);
        Toastr::success('Successfully Logged In');
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        Toastr::success('Logout Successful!!');
        return redirect()->route('home');
    }
}
