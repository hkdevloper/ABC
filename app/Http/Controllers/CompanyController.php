<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    // Function to View Company List
    public function viewCompanyList()
    {
        // Forgot session
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'company');
        return view('pages.user.company.list');
    }

    //Function to view Company Details
    public function viewCompanyDetails()
    {
        return view('pages.user.company.detail');
    }
}
