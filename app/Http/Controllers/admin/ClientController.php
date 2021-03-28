<?php

namespace App\Http\Controllers\admin;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * load client list
     */
    public function index(Request $request)
    {
        $_data = array(
            "model" => new Client,
        );

        return view("admin.client.index", $_data);
    }

    /**
     * Save Client information
     */
    public function store(Request $request)
    {
        dd($request->all());
    }
}
