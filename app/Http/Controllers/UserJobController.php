<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\Product;
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
        $jobs = Job::where('is_approved', 1)->where('is_active', 1)->paginate(10);
        $categories = Category::where('type', 'job')->where('is_active', 1)->get();
        $data = compact('jobs', 'categories');
        return view('pages.job.list')->with($data);
    }

    // Function to view Job Details
    public function viewJobDetails()
    {
        return view('pages.job.detail');
    }
}
