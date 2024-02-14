<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Country;
use App\Models\Deal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserDealController extends Controller
{
    // Function to view Deal List
    public function viewDealList(Request $request)
    {
        // Forgot session
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'deal');

        // Initialize the query to retrieve deals
        $query = Deal::select('deals.*')
            ->join('seo', 'deals.seo_id', '=', 'seo.id')
            ->where('deals.is_active', 1);

        // Search Query
        if ($request->has('q')) {
            $search = $request->q;
            $query->whereHas('seo', function ($seoQuery) use ($search) {
                $seoQuery->whereJsonContains('meta_keywords', $search);
            });
        }

        // Category Filter
        if ($request->has('category')) {
            $category = $request->category;
            $category = Category::where('name', $category)->first();
            $query->where('category_id', $category->id);
        }

        // Country Filter
        if ($request->has('country')) {
            $country = $request->country;
            $query->whereHas('user', function ($query) use ($country) {
                $query->whereHas('company', function ($innerQuery) use ($country) {
                    $innerQuery->whereHas('address', function ($innerInnerQuery) use ($country) {
                        $innerInnerQuery->where('country_id', $country);
                    });
                });
            });
        }

        // Paginate the results
        $deals = $query->paginate(10);

        // Fetch categories
        $categories = Category::where('is_active', 1)->where('type', 'deal')->get();
        // Get Random deals for SEO
        $seo = Deal::where('is_active', 1)->inRandomOrder()->limit(6)->get()->pluck('seo');
        $countries = Country::all();
        $data = compact('categories', 'deals', 'seo', 'countries');
        return view('pages.deals.list')->with($data);
    }

    // Function to view Deal Details
    public function viewDealDetails()
    {
        // Forgot session
        Session::forget('menu');
        return view('pages.deals.detail');
    }
}
