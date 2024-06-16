<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $jobsQuery = Job::select('company_jobs.*', 'seo.title as seo_title')
            ->join('seo', 'company_jobs.seo_id', '=', 'seo.id')
            ->join('companies as co', 'company_jobs.company_id', '=', 'co.id')
            ->where('co.is_approved', 1)
            ->where('co.is_active', 1)
            ->where('company_jobs.is_active', 1)
            ->where('company_jobs.is_approved', 1);

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
            $jobsQuery->where('company_jobs.category_id', $catId->id);
        }
        /** Get Jobs Country
         * Job->address->country
         * Job has address_id
         * Address has country_id
         * Country has id
        */
        if (!empty($countryFilter)) {
            if ($request->has('country')) {
                $country = $request->country;
                $jobsQuery->whereHas('company', function ($query) use ($country) {
                    $query->whereHas('address', function ($innerQuery) use ($country) {
                        $innerQuery->where('country_id', $country);
                    });
                });
            }
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
