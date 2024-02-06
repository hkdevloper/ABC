<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UserJobController extends Controller
{
    // Function to view Job List
    public function viewJobList(Request $request)
    {
        // Forgot session
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'job');
        $query = $request->input('q');
        $categoryFilter = $request->input('category');

        $jobsQuery = Job::where('is_approved', 1)->where('is_active', 1);

        if (!empty($categoryFilter)) {
            // Get Category I'd from Category Name
            $catId = Category::where('name', $categoryFilter)->first();
            $jobsQuery->where('category_id', $catId->id);
        }

        if (!empty($query)) {
            $jobsQuery->where(function ($innerQuery) use ($query) {
                $innerQuery->where('title', 'like', '%' . $query . '%');
            });
        }
        $jobs = $jobsQuery->paginate(12);
        $categories = Category::where('type', 'job')->where('is_active', 1)->get();

        $data = compact('jobs', 'categories');
        return view('pages.job.list')->with($data);
    }

    // Function to view Job Details
    public function viewJobDetails($slug)
    {
        // Forgot session
        Session::forget('menu');
        $job = Job::where('slug', $slug)->firstOrFail();
        $related_jobs = Job::where('category_id', $job->category_id)->where('is_approved', 1)->where('is_active', 1)->where('id', '!=', $job->id)->get();
        // Take only 3 related jobs
        $related_jobs = $related_jobs->take(3);
        $data = compact('job', 'related_jobs');
        return view('pages.job.detail')->with($data);
    }
}
