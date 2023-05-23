<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Week4Controller extends Controller
{
    public function index()
    {
        // return view('week4.landing.index'); // <== Ini dimatikan karena view dibuat dinamis jadi hanya memamnggil file blade yang mengextend atau menginclude file blade lain
        return view('week4.landing.home.index');
    }

    public function dashboard()
    {
        return view('week4.admin.dashboard.index');
    }
    public function loginCreate()
    {
        return view('week4.admin.auth.login');
    }
    
    public function registerCreate()
    {
        return view('week4.admin.auth.register');
    }
}
