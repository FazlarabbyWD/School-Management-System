<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        $data['header_title'] = 'Dashboard';
        if (!empty(Auth::check())) {
            if (Auth::user()->userType === 1) {

                return view('Admin.dashboard',$data);
            } else if (Auth::user()->userType === 2) {

                return view('Teacher.dashboard',$data);
            } else if (Auth::user()->userType === 3) {

                return view('Student.dashboard',$data);
            } else if (Auth::user()->userType === 4) {

                return view('Parent.dashboard',$data);
            }
        }
    }
}
