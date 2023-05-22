<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeekController extends Controller
{

    // Minggu 2 Start
    // Basic Routing
    public function index()
    {
        return "Hello World";
    }       

    // Route Parameter
    public function namedRoute()
    {
        return "ini adalah named route";
    }


    // Minggu 2 End


}
