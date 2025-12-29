<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index'); // root page like index.php
    }

    public function homePage()
    {
        return view('home');
    }

    public function about()
    {
        return view('about-more');
    }
}
