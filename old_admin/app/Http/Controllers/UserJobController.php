<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class UserJobController extends Controller
{
    // Function to view Job List
    public function viewJobList()
    {
        // Forgot session
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'job');
        return view('pages.user.job.list');
    }

    // Function to view Job Details
    public function viewJobDetails()
    {
        return view('pages.user.job.detail');
    }
}
