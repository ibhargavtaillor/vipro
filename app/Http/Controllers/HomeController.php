<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * load site home page
     */
    public function index()
    {
        return view("index");
    }
}
