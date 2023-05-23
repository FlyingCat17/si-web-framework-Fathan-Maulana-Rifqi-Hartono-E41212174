<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Week3Controller extends Controller
{
    // Minggu 3 Start
    /**
     * MVC
     * Model View Controller
     * 
     * Konsep MVC adalah konsep yang memisahkan antara logic dengan tampilan sehingga memudahkan dalam pengembangan aplikasi.
     * Pada file ini adalah controller, dimana controller ini berfungsi untuk menghubungkan antara model dengan view.
     * 
     * Model dibuat jika kita ingin mengakses database, sedangkan view dibuat jika kita ingin menampilkan data ke user.
     */


    public function index()
    {
        return view('week3.welcome'); // <== mengembalikan view welcome.blade.php
    }
}
