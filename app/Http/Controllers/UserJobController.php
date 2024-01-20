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
        $query = Job::where('is_approved', 1);

        if ($request->has('category')) {
            // Get Category I'd from Category Name
            $cat_id = Category::where('name', $request->category)->first();
            $query->where('category_id', $cat_id->id);
        }

        if ($request->has('sort')) {
            if ($request->sort == 'name') {
                $query->orderBy('name', 'asc');
            } elseif ($request->sort == 'price-low-to-high') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price-high-to-low') {
                $query->orderBy('price', 'desc');
            }
        }

        $jobs = $query->paginate(12);
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
