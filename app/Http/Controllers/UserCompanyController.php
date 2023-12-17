<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
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
        if ($request->has('category')) {
            // Get Category I'd from Category Name
            $cat_id = Category::where('name', $request->category)->first();
            $companies = Company::where('is_approved', 1)->where('category_id', $cat_id->id)->paginate(10);
        }
        // Show All Companies
        else if($request->has('show') && $request->show == 'all'){
            $companies = Company::where('is_approved', 1)->paginate(100);
        }
        // Show Active Companies
        else if($request->has('filter') && $request->filter == 'active'){
            $companies = Company::where('is_approved', 1)->where('is_active', 1)->paginate(10);
        }
        // Show the Latest Companies
        else if ($request->has('filter') && $request->filter == 'in-active') {
            $companies = Company::where('is_approved', 1)->where('is_active', 0)->paginate(10);
        }
        // Sort by name
        else if ($request->has('sort') && $request->sort == 'name') {
            $companies = Company::where('is_approved', 1)->orderBy('name', 'asc')->paginate(10);
        }
        // Sort by Date
        else if ($request->has('sort') && $request->sort == 'date') {
            $companies = Company::where('is_approved', 1)->orderBy('created_at', 'desc')->paginate(10);
        }
        else {
            $companies = Company::where('is_approved', 1)->paginate(10);
        }
        // get The Unique Data Only
        $data = compact('companies');
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
