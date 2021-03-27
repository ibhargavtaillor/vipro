<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $guard = "admin";

    /**
     * @description This function is used to login form
     */
    public function loginForm()
    {
        if (auth()->guard('admin')->check()) {
            return redirect("admin/dashboard");
        }
        return view("admin.auth.login");
    }

    /**
     * @description this function is used to verify user
     */
    public function login(Request $request)
    {
        $attempt = ['email' => $request->input('email'), "password" => $request->input('password')];
        if (Auth::guard($this->guard)->attempt($attempt)) {
            return redirect(route('dashboard'));
        } else {
            return redirect('/admin/login')->withErrors("Invalid email or password");
        }
    }

    /**
     * logout
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect("admin/login");
    }
}
