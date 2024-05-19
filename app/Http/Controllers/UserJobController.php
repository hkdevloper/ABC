<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
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
        $countryFilter = $request->input('country');

        // Initialize the query to retrieve deals
        $jobsQuery = Job::select('jobs.*', 'seo.title as seo_title')
            ->join('seo', 'jobs.seo_id', '=', 'seo.id')
            ->join('companies as co', 'jobs.company_id', '=', 'co.id')
            ->where('co.is_approved', 1)
            ->where('co.is_active', 1)
            ->where('jobs.is_active', 1)
            ->where('jobs.is_approved', 1);

        // Search Query
        if ($request->has('q')) {
            $search = $request->q;
            $jobsQuery->whereHas('seo', function ($seoQuery) use ($search) {
                $seoQuery->whereJsonContains('seo.meta_keywords', $search); // Specify table alias 'seo'
            });
        }


        if (!empty($categoryFilter)) {
            // Get Category I'd from Category Name
            $catId = Category::where('name', $categoryFilter)->first();
            $jobsQuery->where('jobs.category_id', $catId->id);
        }
        /** Get Jobs Country
         * Job->address->country
         * Job has address_id
         * Address has country_id
         * Country has id
        */
        if (!empty($countryFilter)) {
            $jobsQuery->whereHas('address', function ($query) use ($countryFilter) {
                $query->where('country_id', $countryFilter);
            });
        }

        $jobs = $jobsQuery->paginate(12);
        $categories = Category::where('type', 'job')->where('is_active', 1)->get();
        $countries = Country::all();
        // Get a Random Job for SEO
        $seo = Job::where('is_approved', 1)->inRandomOrder()->limit(6)->get()->pluck('seo');

        $data = compact('jobs', 'categories', 'countries', 'seo');
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
