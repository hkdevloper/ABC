<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Function to view Admin Login
    public function viewAdminLogin()
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

    // Function to view Forgot Password
    public function viewForgotPassword()
    {
        return view('pages.auth.forgot_password');
    }

    // Function to do Forgot Password
    public function doForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(64);

        try {
            DB::table('password_reset_tokens')->updateOrInsert([
                'email' => $request->email,
            ],['token' => $token]);

            Mail::send('emails.forgot_password', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });
        } catch (Exception $e) {
            return back()->with('type', 'error')->with('msg', $e->getMessage());
        }

        return back()->with('type', 'success')->with('msg', 'Reset password link sent to your email');

    }

    // Function to view reset Password
    public function viewResetPassword(Request $request)
    {
        $token = $request->input('token');
        $token_exists = DB::table('password_reset_tokens')->where('token', $token)->exists();
        if ($token_exists) {
            return view('pages.auth.reset_password', ['token' => $token]);
        }
        return redirect()->route('forgot.password')->with('type', 'error')->with('msg', 'Invalid');
    }

    // Function to do reset Password
    public function doResetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required|exists:password_reset_tokens',
            'password' => 'required|confirmed',
        ]);
        $token = $request->input('token');
        $token_exists = DB::table('password_reset_tokens')->where('token', $token)->exists();
        if ($token_exists) {
            $email = DB::table('password_reset_tokens')->where('token', $token)->value('email');
            DB::table('users')->where('email', $email)->update([
                'password' => bcrypt($request->password),
            ]);
            DB::table('password_reset_tokens')->where('token', $token)->delete();
            return redirect()->route('admin.login')->with('type', 'success')->with('msg', 'Password reset successfully');
        }
        return redirect()->route('auth.reset_password')->with('type', 'error')->with('msg', 'Invalid Token');
    }

}
