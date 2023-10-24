<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Support\Facades\Session;

class UserCompanyController extends Controller
{
    // Function to View Company List
    public function viewCompanyList()
    {
        // Forgot session
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'company');
        $companies = Company::where('is_approved', 1)->where('is_active', 1)->paginate(10);
        $categories = Category::where('type', 'company')->where('is_active', 1)->get();
        $data = compact('companies', 'categories');
        return view('pages.company.list')->with($data);
    }

    //Function to view Company Details
    public function viewCompanyDetails($slug)
    {
        // Forgot session
        Session::forget('menu');
        $company = Company::where('slug', $slug)->first();
        $data = compact('company');
        return view('pages.company.detail')->with($data);
    }
}
