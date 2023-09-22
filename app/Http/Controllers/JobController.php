<?php

namespace App\Http\Controllers;

class JobController extends Controller
{
    // Function to view Job List
    public function viewJobList()
    {
        return view('pages.user.job.list');
    }

    // Function to view Job Details
    public function viewJobDetails()
    {
        return view('pages.user.job.detail');
    }
}
