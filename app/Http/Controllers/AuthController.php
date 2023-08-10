<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->input('remember')) ? true : false;

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember)) {

            // return redirect('admin/dashboard');

            if (Auth::user()->userType === 1) {

                return redirect('admin/dashboard');
            } else if (Auth::user()->userType === 2) {

                return redirect('teacher/dashboard');
            } else if (Auth::user()->userType === 3) {

                return redirect('student/dashboard');
            } else if (Auth::user()->userType === 4) {

                return redirect('parent/dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'please enter Correct
            Email & Password');
        }
    }

    public function Logout()
    {
        Auth::logout();

        return redirect(url(''));
    }
}
