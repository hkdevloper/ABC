<?php

namespace App\Http\Controllers;

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
        $data = Company::all();
        return view('pages.company.list')->with('data', $data);
    }

    //Function to view Company Details
    public function viewCompanyDetails()
    {
        return view('pages.company.detail');
    }
}
