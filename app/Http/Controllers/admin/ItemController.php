<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class ItemController extends Controller
{

    /**
     * @description This function is used to
     */
    public function index()
    {
        return view("admin.item.index");
    }
}
