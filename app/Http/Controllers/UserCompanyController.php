<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserCompanyController extends Controller
{
    // Function to View Company List
    public function viewCompanyList(Request $request)
    {
        // Forgot session
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'company');
        $query = Company::select('companies.*', DB::raw('AVG(rate_reviews.rating) as avg_rating'))
            ->leftJoin('rate_reviews', function ($join) {
                $join->on('companies.id', '=', 'rate_reviews.item_id')
                    ->where('rate_reviews.type', '=', 'company');
            })
            ->where('companies.is_approved', 1)
            ->groupBy('companies.id');

        if ($request->has('category')) {
            // Get Category I'd from Category Name
            $cat_id = Category::where('name', $request->category)->first();
            $query->where('companies.category_id', $cat_id->id);
        }

        if ($request->has('sort')) {
            if ($request->sort == 'name') {
                $query->orderBy('companies.name', 'asc');
            } elseif ($request->sort == 'desc') {
                $query->orderBy('avg_rating', 'desc');
            } elseif ($request->sort == 'asc') {
                $query->orderBy('avg_rating', 'asc');
            }
        }

        $companies = $query->paginate(10);

        // get The Unique Data Only
        $categories = Category::where('type', 'company')->where('is_active', 1)->get();
        $data = compact('companies', 'categories');
        return view('pages.company.list')->with($data);
    }

    //Function to view Company Details
    public function viewCompanyDetails($slug)
    {
        // Forgot session
        Session::forget('menu');
        $company = Company::where('slug', $slug)->firstOrFail();
        $data = compact('company');
        return view('pages.company.detail')->with($data);
    }
}
