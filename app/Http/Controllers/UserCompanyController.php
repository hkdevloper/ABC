<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserCompanyController extends Controller
{
    // Function to View Company List
    public function viewCompanyList(Request $request)
    {
        // Store Session for Home Menu Active
        Session::put('menu', 'company');

        // Initialize the base query to retrieve companies with average rating
//        $query = Company::select('companies.*', DB::raw('AVG(rate_reviews.rating) as avg_rating'))
//            ->leftJoin('rate_reviews', function ($join) {
//                $join->on('companies.id', '=', 'rate_reviews.item_id')
//                    ->where('rate_reviews.type', '=', 'company');
//            })
//            ->join('seo', 'companies.seo_id', '=', 'seo.id')
//            ->where('companies.is_approved', 1)
//            ->where('companies.is_active', 1)
//            ->groupBy('companies.id');
        $query = Company::select('companies.*', DB::raw('AVG(rate_reviews.rating) as avg_rating'))
            ->leftJoin('rate_reviews', function ($join) {
                $join->on('companies.id', '=', 'rate_reviews.item_id')
                    ->where('rate_reviews.type', '=', 'company');
            })
            ->join('seo', 'companies.seo_id', '=', 'seo.id')
            ->where('companies.is_approved', true)
            ->where('companies.is_active', true)
            ->groupBy(
                'companies.id',
                'companies.is_approved',
                'companies.is_claimed',
                'companies.is_active',
                'companies.is_featured',
                'companies.user_id',
                'companies.claimed_by',
                'companies.category_id',
                'companies.business_type',
                'companies.name',
                'companies.slug',
                'companies.description',
                'companies.extra_things',
                'companies.banner',
                'companies.logo',
                'companies.gallery',
                'companies.phone',
                'companies.email',
                'companies.website',
                'companies.facebook',
                'companies.twitter',
                'companies.instagram',
                'companies.linkdin',
                'companies.youtube',
                'companies.address_id',
                'companies.seo_id',
                'companies.established_at',
                'companies.number_of_employees',
                'companies.turnover',
                'companies.created_at',
                'companies.updated_at',
                'companies.is_rejected',
                'companies.rejected_reason',

            );

        // Search Query
        if ($request->has('q')) {
            $search = $request->q;
            $query->whereHas('seo', function ($seoQuery) use ($search) {
                $seoQuery->whereJsonContains('meta_keywords', $search);
            });
        }

        // Filter by Category
        if ($request->has('category')) {
            // Get Category ID from Category Name
            $category = Category::where('name', $request->category)->where('type', 'company')->first();
            if ($category) {
                $query->where('companies.category_id', $category->id);
            }
        }

        // Sorting
        if ($request->has('sort')) {
            $sortField = $request->sort;
            if ($sortField === 'name') {
                $query->orderBy('companies.name', 'asc');
            } elseif ($sortField === 'desc') {
                $query->orderBy('avg_rating', 'desc');
            } elseif ($sortField === 'asc') {
                $query->orderBy('avg_rating', 'asc');
            }
        }

        // Paginate the results
        $companies = $query->paginate(10);

        // Get Random Companies for SEO
        $seo = Company::where('is_approved', 1)->inRandomOrder()->limit(6)->get()->pluck('seo');

        // Fetch categories
        $categories = Category::where('type', 'company')->where('is_active', 1)->get();

        $data = compact('companies', 'categories', 'seo');
        return view('pages.company.list')->with($data);
    }

    //Function to view Company Details
    public function viewCompanyDetails($slug)
    {
        // Forgot session
        Session::forget('menu');
        $company = Company::where('slug', $slug)->firstOrFail();
        $user = auth()->user() ? auth()->user() : new User();
        $data = compact('company', 'user');
        return view('pages.company.detail')->with($data);
    }
}
