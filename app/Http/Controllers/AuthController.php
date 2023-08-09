<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {

        if (!empty(Auth::check())) {
            return redirect('admin/dashboard');
        }
        return view('Auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->input('remember')) ? true : false;

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember)) {
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'please enter Email & Password');
        }
    }
}
