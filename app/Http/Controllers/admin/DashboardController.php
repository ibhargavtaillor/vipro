<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * load index page
     */
    public function dashboard()
    {
        return view('admin.index');
    }
}
