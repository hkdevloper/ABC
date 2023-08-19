<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Jobs;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function initCrudView(): array
    {
        // get all the users
        $users = User::all();
        // get all the categories
        $categories = Category::where('type', 'product')->get();
        // get all the Countries from location table
        $countries = Location::where('parent_id', 0)->orWhere('parent_id', null)->get();

        return compact('users', 'categories', 'countries');
    }
    // Function to view All Jobs
    public function viewJobs()
    {
        $jobs = Jobs::all();
        $data = compact('jobs');
        return view('pages.admin.jobs.view_all')->with($data);
    }

    // Function to view Add Job
    public function viewAddJob(Request $request)
    {
        $data = $this->initCrudView(); // get all the users, categories, countries and states
        return view('pages.admin.jobs.add')->with($data);
    }

    // Function to view Edit Job
    public function viewEditJob()
    {
        return view('pages.admin.jobs.edit');
    }
}
