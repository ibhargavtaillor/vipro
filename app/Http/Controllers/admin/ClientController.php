<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * load client list
     */
    public function index(Request $request)
    {
        return view("admin.client.index");
    }
}
