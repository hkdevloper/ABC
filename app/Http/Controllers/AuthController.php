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
        return view('pages.admin-auth.admin_login');
    }

    // Function to view User Login
    public function viewUserLogin()
    {
        return view('pages.user.auth.login');
    }

    // Function to view User Register
    public function viewUserRegister()
    {
        return view('pages.user.auth.register');
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

        return back()->with(['types' => 'error', 'msg' => 'Invalid Credentials']);
    }

    // Function to Log out user
    public function doLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    // Function to view Admin Forgot Password
    public function viewForgotPassword()
    {
        return view('pages.admin-auth.forgot_password');
    }

    // public function to view user forgot password
    public function viewUserForgotPassword()
    {
        return view('pages.user.auth.forgot-password');
    }

    // public function to view user reset password
    public function viewUserResetPassword(Request $request)
    {
//        $token = $request->input('token');
//        $token_exists = DB::table('password_reset_tokens')->where('token', $token)->exists();
//        if ($token_exists) {
        return view('pages.user.auth.reset_password');
//        }
//        return redirect()->route('user.forgot.password')->with(['types' => 'error', 'msg' => 'Invalid Token']);
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
            return back()->with(['types' => 'error', 'msg' => 'Something went wrong']);
        }

        return back()->with(['types' => 'success', 'msg' => 'Reset Password link sent to your email']);

    }

    // Function to view reset Password
    public function viewResetPassword(Request $request)
    {
        $token = $request->input('token');
        $token_exists = DB::table('password_reset_tokens')->where('token', $token)->exists();
        if ($token_exists) {
            return view('pages.admin-auth.reset_password', ['token' => $token]);
        }
        return redirect()->route('forgot.password')->with(['types' => 'error', 'msg' => 'Invalid Token']);
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
            return redirect()->route('admin.login')->with(['types' => 'success', 'msg' => 'Password Reset Successfully']);
        }
        return redirect()->route('admin-auth.reset_password')->with(['types' => 'error', 'msg' => 'Invalid Token']);
    }

}
