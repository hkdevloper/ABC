<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Function to view Admin Login
    public function adminLogin()
    {
        return view('pages.auth.admin_login');
    }

    // Function to Log in user
    public function doLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember_me = $request->input('remember_me'); // This is optional
        if (Auth::attempt(['email' => $email, 'password' => $password, 'approved' => 1, 'banned' => 0], $remember_me)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }


        return back()->with(['error' => 'Invalid Login Credentials']);
    }

    // Function to Log out user
    public function doLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
