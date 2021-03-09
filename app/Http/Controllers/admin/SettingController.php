<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * @description This function is used to load setting form
     */
    public function setting()
    {
        return view('admin.settings');
    }
}
