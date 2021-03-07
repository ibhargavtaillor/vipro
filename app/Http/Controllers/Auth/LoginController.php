<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * @description This function is used to login form
     */
    public function loginForm()
    {
        return view("admin.auth.login");
    }

    /**
     * @description this function is used to verify user
     */
    public function login()
    {
        return redirect(route('dashboard'));
    }
}
