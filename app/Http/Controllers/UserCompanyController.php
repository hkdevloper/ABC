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
        if($request->has('category')){
            // Get Category Id from Category Name
            $cat_id = Category::where('name', $request->category)->first();
            $companies = Company::where('is_approved', 1)->where('is_active', 1)->where('category_id', $cat_id)->paginate(10);
        }else{
            $companies = Company::where('is_approved', 1)->where('is_active', 1)->paginate(10);
        }
        $data = compact('companies');
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
