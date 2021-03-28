<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Items;

class ItemController extends Controller
{

    /**
     * @description This function is used to
     */
    public function index()
    {
        $_data = array(
            'model' => new Items,
        );
        return view("admin.item.index", $_data);
    }
}
