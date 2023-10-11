<?php

namespace App\Http\Controllers;

use App\DataTables\UserCompanyDataTable;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
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
            if(Auth::user()->user_group_id == 1){
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('user.dashboard');
        }

        return back()->with(['types' => 'error', 'msg' => 'Invalid Credentials']);
    }

    // Function to Register user
    public function doRegister(Request $request){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        // Send Verification Email to User
        $token = Str::random(64);
        DB::table('email_verification_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name ?? '';
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->approved = 1;
        $user->email_verified = 1;
        $user->user_group_id = 2;
        $user->save();
        return redirect()->route('user.login')->with(['types' => 'success', 'msg' => 'Registered Successfully']);
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
        $token = $request->input('token');
        $token_exists = DB::table('password_reset_tokens')->where('token', $token)->exists();
        if ($token_exists) {
        return view('pages.user.auth.reset_password');
        }
        return redirect()->route('user.forgot.password')->with(['types' => 'error', 'msg' => 'Invalid Token']);
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

    /* ----------------------- User Auth ------------------------ */

    // Function to view User Dashboard
    public function userDashboard(UserCompanyDataTable $dataTable)
    {
        // Forgot session
        Session::forget('menu');
        $user = \auth()->user();
        if (!$user) {
            return redirect()->route('user.login')->with(['types' => 'error', 'msg' => 'Please Login to Continue']);
        }
        return $dataTable->render('pages.user.auth.dashboard')->with(['user' => $user]);
    }
    // Function to Edit User Profile
    public function editUserProfile(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'phone' => 'nullable|numeric|digits:10',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'pincode' => 'nullable|numeric|digits:6',
        ]);

        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->pincode = $request->pincode;
        $user->save();

        return back()->with(['types' => 'success', 'msg' => 'Profile Updated Successfully']);
    }

}
