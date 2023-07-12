<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Function to view All Jobs
    public function viewJobs()
    {
        return view('pages.admin.jobs.view_all');
    }

    // Function to view Add Job
    public function viewAddJob()
    {
        return view('pages.admin.jobs.add');
    }

    // Function to view Edit Job
    public function viewEditJob()
    {
        return view('pages.admin.jobs.edit');
    }
}
